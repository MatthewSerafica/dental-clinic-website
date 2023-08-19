<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['pat_type','last_name', 'first_name', 'birth_date', 'address', 'sex', 'civil_status'];
}
