<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Treasury extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'name',
        'treasury_secretary',
        'balance',
        'active',
    ];

    public function users()
    {
        $this->belongsTo(User::class, 'user_id', 'id');
    }
}
