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
        Schema::create('tentang', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('tentang', 1024);
            $table->string('alamat', 1024);
            $table->string('visi', 1024);
            $table->string('misi', 1024);
            $table->date('awal_berdiri');

            // kontak
            $table->string('email');
            $table->tinyInteger('telepon');
            $table->tinyInteger('whatsapp')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tentang');
    }
};
