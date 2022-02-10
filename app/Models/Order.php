<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    /**
     * @return int
     */
    public function getFullPrice(): int
    {
        $sum = 0;
        foreach ($this->products as $product) {
            $sum += $product->getPriceForCount();
        }

        return $sum;
    }

    /**
     * @param string $name
     * @param string $phone
     * @return bool
     */
    public function saveOrder(string $name, string $phone): bool
    {
        if ($this->status != 0) {
            return false;
        }

        $this->name = $name;
        $this->phone = $phone;
        $this->status = 1;
        $this->save();

        session()->forget('orderId');

        return true;
    }
}
