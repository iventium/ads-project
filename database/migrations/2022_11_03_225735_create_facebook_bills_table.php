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
        Schema::create('facebook_bills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('date_id');
            $table->foreign('date_id')->references('id')->on('facebook_bills_dates')->onDelete('cascade');
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->string('campaign');
            $table->decimal('amount', $precision = 6, $scale = 2);
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
        Schema::dropIfExists('facebook_bills');
    }
};
