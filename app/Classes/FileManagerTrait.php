<?php
namespace App\Classes;

trait FileManagerTrait
{
    public function thumbnail(string $name)
    {
        $path = $this->getImageFolder();
        $pathLastPart = str_ireplace($path, '', $this->{$name});
        return $this->getImageFolder() . $this->getImageName($pathLastPart);
    }

    protected function getImageName($imageName): string
    {
        $newImageName = [];

        $imageName = explode('/', $imageName);
        $newImageName[] = array_pop($imageName);
        $imageName[] = 'thumbs';
        return implode('/', array_merge_recursive($imageName, $newImageName));
    }

    public function getImageFolder(): string
    {
        return env('APP_URL', 'http://localhost') . '/storage/photos/1/';
    }
}
