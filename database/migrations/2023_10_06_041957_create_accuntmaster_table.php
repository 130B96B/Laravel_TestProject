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
        Schema::create('accuntmaster', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('furigana');
            $table->string('email');
            $table->string('tel');
            $table->string('postalcode');
            $table->string('password');
            $table->string('prefecture');
            $table->string('cities');
            $table->string('address');
            $table->text('contact_body');
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
        Schema::dropIfExists('accuntmaster');
    }
};
