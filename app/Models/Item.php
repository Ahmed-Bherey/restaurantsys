<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'category_id',
        'img',
        'name',
        'desc',
        'price',
        'active',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function categories(){
        return $this->belongsTo(Category::class, 'category_id','id');
    }
}
