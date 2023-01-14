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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date("check_in_date");
            $table->date("check_out_date");
            $table->string("name");
            $table->string("contact_no");
            $table->text("address")->nullable();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("room_id");
            $table->tinyInteger("approval_status")->default(2)->comment("1=approve,2=pending,3=reject");
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
        Schema::dropIfExists('reservations');
    }
};
