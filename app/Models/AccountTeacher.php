<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountTeacher extends Model
{
    use HasFactory;

    protected $table="account_teachers";

    protected $primaryKey = "id";

    protected $fillable =[
        'name',
        'username',
        'password',
    ];
}
