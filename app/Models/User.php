<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'surname', 'patronymic', 'phone_number', 'birth', 'login', 'password', 'email', 'api_token', 'role_id'];

    // Прячем
    protected $hidden = ['password'];

    

}
