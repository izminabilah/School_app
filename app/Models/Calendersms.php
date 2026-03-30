<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendersms extends Model
{
    use HasFactory;

    protected $table="calendersms";

    protected $primaryKey = "id";

    protected $fillable =[
        'event',
        'from',
        'to',
        'description',
        'type_event',
    ];
}
