<?php

namespace App\Models;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory, Notifiable;

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

    public function invoicePdfPath()
    {
        $invoicesPath = 'app/public/invoices/';

        if (! Storage::exists($invoicesPath)) {
            Storage::makeDirectory('public/invoices/');
        }

        return storage_path($invoicesPath).$this->invoiceName();
    }

    private function invoiceName()
    {
        return Str::slug($this->id.' '.$this->user->fullName().' '.'invoice-file').'.pdf';
    }

    public function downloadInvoice()
    {
        return Storage::exists($this->invoicePdfPath())
            ? Storage::download($this->invoicePdfPath())
            : $this->errorRedirectMsg();
    }

    private function errorRedirectMsg()
    {
        return redirect()->route('order.index', $this->user->slug)
            ->with('error', __('payment.file does not exists'));
    }
}
