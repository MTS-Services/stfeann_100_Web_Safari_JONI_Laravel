<?php

namespace App\Models;

use App\Models\AuthBaseModel;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends AuthBaseModel implements MustVerifyEmail
{
   

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'sort_order',
        'image',
        'name',
        'email',
        'password',
        'email_verified_at',
        'status',
        
        'creater_id',
        'creater_type',
        'updater_id',
        'updater_type',
        'deleter_id',
        'deleter_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
