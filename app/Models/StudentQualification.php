<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentQualification extends Model
{
    use HasFactory;
    protected $fillable=[
        "examination",
        "board",
        "percentage",
        "passing_year",
        "student_id"
    ];
}
