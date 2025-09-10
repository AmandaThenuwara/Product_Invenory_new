<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id',
        'company_name',
        'order_date',
        'status',
        'total_amount',
    ];
}
