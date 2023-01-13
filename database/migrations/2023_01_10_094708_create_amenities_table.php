<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('amenities', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->tinyInteger("status")->default(1)->comment("1=active,2=inactive");
            $table->timestamps();
        });
        DB::table('amenities')->insert([
            ['name' => 'wifi'],
            ['name' => '“breakfast”,'],
            ['name' => 'ac']]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amenities');
    }
};
