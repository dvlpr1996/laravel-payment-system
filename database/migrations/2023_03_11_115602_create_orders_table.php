<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('code', 250)->unique();
            $table->integer('amount');
            $table->integer('quantity');
            $table->timestamps();
        });
        DB::update('alter table orders AUTO_INCREMENT = 100000');
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
