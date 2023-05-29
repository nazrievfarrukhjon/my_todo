<?php

namespace App\Models;

use Database\Factories\TodoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
    ];

    protected static function newFactory(): TodoFactory
    {
        return TodoFactory::new();
    }
}
