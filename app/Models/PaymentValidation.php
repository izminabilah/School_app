<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentValidation extends Model
{
    use HasFactory;

    protected $table="PaymentValidation";

    protected $primaryKey = "id";

    protected $fillable =[
        'bulan',
        'waktu',
        'id_siswa',
    ];
}
