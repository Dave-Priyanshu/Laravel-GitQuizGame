<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'questions';// Specify table name if not default

    protected $fillable = ['question', 'answer']; // Define fillable attributes 
}
