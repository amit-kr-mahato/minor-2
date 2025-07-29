<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
    'pidx',
    'transaction_id',
    'tidx',
    'txn_id',
    'amount',
    'total_amount',
    'mobile',
    'status',
    'purchase_order_id',
    'purchase_order_name',
    'user_id'
];

}
