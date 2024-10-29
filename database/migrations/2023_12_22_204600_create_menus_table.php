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
        Schema::create('menu', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('menu_id')->nullable()->comment('Sebagai sub-menu');
            $table->unsignedTinyInteger('ref_jenis_menu_id');
            $table->string('nama_menu');
            $table->unsignedTinyInteger('laman_id')->nullable();
            $table->string('redirect_link')->nullable();
            $table->boolean('is_required');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
};
