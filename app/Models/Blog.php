<?php

namespace App\Models;

use App\Casts\TranslatableCast;
use App\Classes\FileManagerTrait;
use App\Classes\ThumbnailGenerator;
use App\Classes\Translating;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use FileManagerTrait, Translating;

    public $translatings = ['title', 'description', 'body', 'meta_title', 'meta_keywords', 'meta_description'];

    protected $fillable = ['title', 'category_id', 'user_id', 'slug', 'description', 'body', 'status', 'image', 'meta_title', 'meta_description', 'meta_keywords', 'created_at'];

    protected $casts = [
        'title' => TranslatableCast::class,
        'description' => TranslatableCast::class,
        'body' => TranslatableCast::class,
        'meta_title' => TranslatableCast::class,
        'meta_keywords' => TranslatableCast::class,
        'meta_description' => TranslatableCast::class,
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'id', 'category_id');
    }
}
