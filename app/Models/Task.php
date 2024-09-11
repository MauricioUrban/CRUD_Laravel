<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    // que datos le puedo almacenar en forma masiva
    protected $fillable = ['title', 'description', 'due_date', 'status'];
    
}
