<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'done'
    ];

    protected $hidden = [
        "created_at",
        "updated_at"
    ];

    protected $casts = [
        'done' => 'boolean'
    ];
}
