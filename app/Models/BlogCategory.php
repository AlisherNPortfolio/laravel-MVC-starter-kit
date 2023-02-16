<?php

namespace App\Models;

use App\Casts\TranslatableCast;
use App\Classes\FileManagerTrait;
use App\Classes\Translating;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use Translating, FileManagerTrait;

    protected $fillable = ['name', 'slug', 'image'];

    public $translatings = ['name'];

    protected $casts = [
        'name' => TranslatableCast::class
    ];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }
}
