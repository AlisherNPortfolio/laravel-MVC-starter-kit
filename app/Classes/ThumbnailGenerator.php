<?php
namespace App\Classes;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait ThumbnailGenerator {

    public function thumbnail(string $field, string $size = '200', bool $aspect_ratio = false)
    {
        $sizes = $this->convertSize($field, $size);
        if ($sizes) {
            $normalizedImagePath = $this->getThumbnailPath($field, $sizes);
            try {
                return $this->generateThumbnail($field, $normalizedImagePath, $sizes, $aspect_ratio);
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
        return '/dashboard/images/no-image.png';
    }

    protected function getThumbnailPath(string $field, array $sizes)
    {
        $imageFolder = $this->getMainFolderName($field);
        $thumbnailFolder = $imageFolder . DIRECTORY_SEPARATOR . 'thumbnails/' . $sizes[0] . 'x' . $sizes[1];
        return str_replace("\\", "/", $thumbnailFolder);
    }

    private function getMainFolderName(string $field)
    {
        return substr($this->{$field}, 0, strrpos($this->{$field},"/"));
    }

    protected function convertSize($field, $size)
    {
        if ($this->checkImageExists($field)) {
            $sizes = explode('x', $size);
            $sizes[1] = $sizes[1] ?? $sizes[0];
        }
        return isset($sizes) && is_array($sizes) ? $sizes : null;
    }

    protected function checkOrCreateFolder(string $folder): bool
    {
        $path = storage_path('app/' . $this->getDisc()) . '/' . $folder;
        if (!is_dir($path)) {
            return Storage::disk($this->getDisc())->makeDirectory($folder);
        }
        return true;
    }

    public function checkImageExists(string $field): bool
    {
        return Storage::disk($this->getDisc())->exists($this->{$field});
    }

    protected function getSourceImageName(string $field)
    {
        $directorySeparator = $this->directorySeparator ?? '/';
        $imageData = explode($directorySeparator, $this->{$field});
        return $imageData[count($imageData) - 1];
    }

    protected function getDisc(): string
    {
        return $this->disc ?? 'public';
    }

    protected function generateThumbnail($src, $dest, $sizes, $aspect_ratio)
    {
        if (!$this->checkOrCreateFolder($dest)) {
            throw new FileNotFoundException('Thumbnail folder could not be created');
        }

        if ($this->checkImageExists($src)) {
            $sourceImageName = $this->getSourceImageName($src);
            $desired_width = (int) $sizes[0];
            $desired_height = (int) ($sizes[1] ?? $sizes[0]);

            $img = storage_path('app/' . $this->getDisc() . '/' . $this->{$src});
            $thumbnailName = $dest . '/' . $sourceImageName;//dd($thumbnailName);
            // TODO: asosiy rasm almashganda, eski thumbnail rasmni o'chirib tashash. PROBLEM: bazadagi eski rasm nomini bilib bo'lmayapti
            if (!$this->thumbnailExists($thumbnailName)) {
                $image = storage_path('app/' . $this->getDisc()) .  '/' .$thumbnailName;
                Image::make($img)
                    ->resize($desired_width, $desired_height, static function ($constraint) use ($aspect_ratio) {
                        if ($aspect_ratio) {
                            $constraint->aspectRatio();
                        }
                    })
                    ->save($image);
            }
            return Storage::disk($this->getDisc())->url($thumbnailName);
        }

        throw new FileNotFoundException('The source image not found');
    }

    public function thumbnailExists(string $imageName): bool
    {
        return Storage::disk($this->getDisc())->exists($imageName);
    }

    public function deleteImageAndThumbnail()
    {

        if (!$this->file_name) {
            throw new \InvalidArgumentException("'file_name' property undefined in a model!");
        }

        if ($this->{$this->file_name}) {
            $this->deleteThumbnail();
            return $this->deleteImage();
        }
        return false;
    }

    protected function deleteImage()
    {
        if (Storage::disk($this->getDisc())->exists($this->{$this->file_name})) {
            $storagePath = storage_path('app/' . $this->getDisc()) . '/';
            return unlink( $storagePath . $this->{$this->file_name});
        }
        return true;
    }

    protected function deleteThumbnail()
    {
        $scannedThumbnails = $this->scan_thumbnails(storage_path('app/' . $this->getDisc()) . '/' . explode('/', $this->{$this->file_name})[0] . '/thumbnails');
        $image = $this->getSourceImageName($this->file_name);
        $mainDir = $this->getMainFolderName($this->file_name);
        foreach ($scannedThumbnails as $key => $item) {
            if (is_array($item) && in_array($image, $item, true)) {
                unlink(storage_path('app/' . $this->getDisc()) . '/' . $mainDir . '/thumbnails/' . $key . '/' . $image);
            }
        }
    }

    protected function scan_thumbnails($dir): array
    {
        $result = [];
        $cdir = scandir($dir);
        foreach ($cdir as $key => $value) {
            if (!in_array($value,array(".",".."))) {
                if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) {
                    $result[$value] = $this->scan_thumbnails($dir . DIRECTORY_SEPARATOR . $value);
                } else {
                    $result[] = $value;
                }
            }
        }
        return $result;
    }
}
