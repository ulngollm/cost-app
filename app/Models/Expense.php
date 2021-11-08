<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    // protected $table = 'expense';

    public $timestamps = false;
    protected $fillable = [//если не указать, нельзя будет установить свойства через Expense::create()
        'name',
        'category',
        'quantity',
        'sum',
        'date',
    ];
}
