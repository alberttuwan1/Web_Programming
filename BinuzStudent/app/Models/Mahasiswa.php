<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'major',
        'faculty',
        'DOB',
        'GPA'
    ];

    protected $primaryKey = 'student_id';
}
