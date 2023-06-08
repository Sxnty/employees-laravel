<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['firstname', 'surname', 'email', 'address', 'photo', 'phoneNumber', 'employeeNote', 'salary'];
    use HasFactory;
}
