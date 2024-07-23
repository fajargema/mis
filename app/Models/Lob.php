<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lob extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'client',
        'reason',
        'burden',
        'date',
    ];
}
