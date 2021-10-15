<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = "expenses";
    protected $fillable = [
        'expense_id',
        'description',
        'spent_money',
        'event_date',
        'category_id',
        'lat',
        'lng'
    ];

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'cat_id', 'category_id');
    }
}
