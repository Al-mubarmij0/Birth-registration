<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_center', 'state', 'lga', 'registration_date',
        'first_name', 'surname', 'gender', 'date_of_birth', 'place_of_birth',
        'father_name', 'father_occupation', 'mother_name', 'mother_occupation'
    ];
}
