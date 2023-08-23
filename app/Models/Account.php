<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'gender_id', 'image', 'email', 'password'
    ];

    public function orders(){
        return $this->belongsToMany(Order::class);
    }

    public function roles(){
        return $this->hasOne(Role::class);
    }

    public function genders(){
        return $this->hasOne(Gender::class);
    }
}
