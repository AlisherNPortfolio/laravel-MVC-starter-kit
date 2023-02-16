<?php

namespace App\Models;

use App\Classes\FileManagerTrait;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use FileManagerTrait;

    protected $fillable = ['user_id', 'first_name', 'last_name', 'avatar', 'self_description', 'address', 'gender'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
