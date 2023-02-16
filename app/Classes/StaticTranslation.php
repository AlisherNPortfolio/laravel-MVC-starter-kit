<?php


namespace App\Classes;


use App\Casts\TranslatableCast;
use Illuminate\Database\Eloquent\Model;

class StaticTranslation extends Model
{
    use Translating;
    public $timestamps = false;
    protected $guarded = ['id'];

    public $translatings = ['value'];

    protected $casts = [
        'value' => TranslatableCast::class
    ];
}
