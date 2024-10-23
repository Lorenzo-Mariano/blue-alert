<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    public function articles()
    {
        return $this->hasMany(Article::class, 'author_id');
    }

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'email_verified_at',
        'is_admin',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
