<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['name', 'code', 'price', 'category_id', 'description', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return int
     */
    public function getPriceForCount(): int
    {
        if (!is_null($this->pivot)) {
            return $this->price * $this->pivot->count;
        }

        return $this->price;
    }
}
