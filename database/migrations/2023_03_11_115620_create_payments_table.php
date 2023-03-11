<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('order_id')
                ->constrained('orders')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('method');
            $table->string('gateway')->nullable();
            $table->string('ref_num')->nullable();
            $table->integer('amount');
            $table->tinyInteger('status')->comment('0 : Incomplete , 1 : complete');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
