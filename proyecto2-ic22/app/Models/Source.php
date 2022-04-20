<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;
    protected $namespace = 'App\\Http\\Controllers';
    protected $table = 'sources';
    protected $primaryKey = 'id';

    protected $fillable = ['url', 'nameSource', 'idCategory', 'idUser'];
}
