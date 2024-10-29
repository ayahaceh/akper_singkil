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
        Schema::create('tim', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('selaku');
            $table->string('profil')->default('default.png');
            $table->string('tentang', 1024);

            // kontak
            $table->string('email')->nullable();
            $table->tinyInteger('telepon')->nullable();
            $table->tinyInteger('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tim');
    }
};
