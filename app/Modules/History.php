<?php

namespace App\Modules;

use Database\Factories\HistoryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        "body",
        "action",
    ];

    protected static function newFactory(): HistoryFactory
    {
        return HistoryFactory::new();
    }
}
