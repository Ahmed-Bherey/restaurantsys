<?php

namespace App\Models;

use App\Models\Item;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderHidden extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'item_id',
        'img',
        'name',
        'price',
        'desc',
        'quantity',
    ];

    public function items(){
        return $this->belongsTo(Item::class, 'item_id','id');
    }
}
