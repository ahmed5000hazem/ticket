<?php

namespace App\Models\Events;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'overview',
        'date',
        'duration',
        'duration_unit',
        'category_id',
        'published',
    ];
}
