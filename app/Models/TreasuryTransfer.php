<?php

namespace App\Models;

use App\Models\User;
use App\Models\Treasury;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TreasuryTransfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'treasuryFrom_id',
        'treasuryTo_id',
        'amount',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function treasuriesFrom(){
        return $this->belongsTo(Treasury::class, 'treasuryFrom_id','id');
    }

    public function treasuriesTo(){
        return $this->belongsTo(Treasury::class, 'treasuryTo_id','id');
    }
}
