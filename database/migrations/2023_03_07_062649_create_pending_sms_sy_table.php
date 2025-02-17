<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingSmsSyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_sms_sy', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pending_id');
            $table->BigInteger('request_id')->unique();
            $table->string('sms', 200);
            $table->foreign('pending_id')->references('id')->on('pending_gsm_sy');
            $table->boolean('is_processed')->default(0);
            $table->string('command', 50)->nullable();
            $table->string('mt', 500)->nullable();
            $table->string('op_response', 200)->nullable();
            $table->integer('short_code');
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
        Schema::dropIfExists('pending_sms_sy');
    }
}
