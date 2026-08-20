<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'category_id', 'name', 'code_item', 'stock', 'condition', 'location', 'notes'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
