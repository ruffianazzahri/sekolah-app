<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $table = 'activity'; // Nama tabel di database
    protected $fillable = [
        'day',
        'time_start',
        'time_end',
        'description',
        'mentor',
    ];
}