<?php

namespace App\Models\Events;

use App\Models\Categories\Category;
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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
