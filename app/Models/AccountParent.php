<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountParent extends Model
{
    use HasFactory;

    protected $table="account_parents";

    protected $primaryKey = "id";

    protected $fillable =[
        'name',
        'username',
        'password',
    ];
}
