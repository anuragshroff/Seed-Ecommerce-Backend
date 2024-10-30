<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $guarded = [];

    // In Order.php model
    protected $casts = [
        'date' => 'date',
    ];




    public function order_attributes()
    {
        return $this->hasMany(OrderAttribute::class, 'order_id');
    }
}
