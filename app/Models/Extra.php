<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Extra extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'tax',
        'hide_tax',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
