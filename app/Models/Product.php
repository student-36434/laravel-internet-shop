<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
//    public function getCategory()
//    {
//        return Category::find($this->category_id);
//    }

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
