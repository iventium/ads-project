<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->string('promotion_link');
            $table->string('campaign');
            $table->string('type');
            $table->date('start_at')->nullable();
            $table->date('ends_at')->nullable();
            $table->integer('days');
            $table->decimal('investment_per_day', $precision = 6, $scale = 2);
            $table->decimal('invoiced', $precision = 6, $scale = 2);
            $table->decimal('commission', $precision = 6, $scale = 2);
            $table->decimal('total', $precision = 6, $scale = 2);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
};
