<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeOption extends Model
{
    protected $guarded = [];

    public function attributes()
    {
        return $this->belongsTo(Attribute::class, 'attribute_id', 'id');
    }

    public function attributes_option()
    {
        return $this->belongsTo(AttributeOption::class, 'option_id', 'id');
    }


}
