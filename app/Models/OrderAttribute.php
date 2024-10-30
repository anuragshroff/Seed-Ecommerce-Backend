<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAttribute extends Model
{
    //
    protected $guarded = [];
    
    public function attributes()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id', 'id');
    }

    public function attributes_option()
    {
        return $this->belongsTo(AttributeOption::class, 'attribute_option_id', 'id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

}
