<?php

namespace App\Models;

use App\Models\User;
use App\Models\Payment;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['user_id', 'code', 'amount'];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function totalCost()
    {
        return $this->amount + config('payment.transportationCosts');
    }

    public function createInvoice()
    {
        $pdf = PDF::loadView('invoice.invoice', ['order' => $this]);
        $pdf->save($this->invoicePdfPath());
    }

    private function invoicePdfPath()
    {
        if (!Storage::exists('app/public/invoices/')) {
            Storage::makeDirectory('public/invoices/');
        }
        return storage_path('app/public/invoices/') . $this->invoiceName() . '.pdf';
    }

    private function invoiceName()
    {
        return Str::slug($this->id . ' ' . $this->user->fullName() . ' ' . time());
    }
}
