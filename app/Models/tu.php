<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tu extends Model
{
    use HasFactory;

    protected $table="tu";

    protected $primaryKey = "id";

    protected $fillable =[
        'nama',
        'alamat',
        'username',
        'password',
        'is_admin'
    ];
}

