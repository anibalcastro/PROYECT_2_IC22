<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\User as Authenticatable;


class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = ['firstName', 'lastName', 'email', 'password', 'country', 'adress', 'phone', 'roleId'];
}
