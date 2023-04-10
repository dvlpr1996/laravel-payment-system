<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'order_id', 'amount', 'status', 'method', 'gateway', 'ref_num',
    ];

    protected $attributes = [
        'status' => 0,
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function checkStatus()
    {
        return $this->status === 0 ? 'uncompleted' : 'done';
    }
}
