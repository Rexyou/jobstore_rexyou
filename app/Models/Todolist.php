<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    
    protected $fillable = ['task_description', 'complete_status', 'session_id'];
}
