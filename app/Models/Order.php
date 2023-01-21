<?php

namespace App\Models;

use App\Models\OrderTotal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'orderTotal_id',
        'img',
        'name',
        'price',
        'quantity',
    ];

    public function order_totals(){
        return $this->belongsTo(OrderTotal::class, 'orderTotal_id','id');
    }
}
