<?php

namespace App\Models;

use App\Models\User;
use App\Models\Supplier;
use App\Models\ExpenseSection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'supplier_id',
        'expenseSection_id',
        'date',
        'amount',
        'notes',
    ];

    public function users(){
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function suppliers(){
        return $this->belongsTo(Supplier::class, 'supplier_id','id');
    }

    public function expense_sections(){
        return $this->belongsTo(ExpenseSection::class, 'expenseSection_id','id');
    }
}
