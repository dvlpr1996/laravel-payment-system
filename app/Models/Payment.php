<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

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
        if ($this->method === 'cash' && $this->status === 0) {
            return 'Not Cash Payed';
        }
        if ($this->method === 'online' && $this->status === 0) {
            return 'Failed';
        }
        if ($this->status === 1) {
            return 'Done';
        }
    }
}
