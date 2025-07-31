<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'image',
        'name',
        'campus',
        'class',
        'group',
        'subgroup',
        'email',
        'cne_number',
        'cin_number',
        'gender',
        'date_of_birth',
        'nationality',
        'bac_series',
    ];
}
