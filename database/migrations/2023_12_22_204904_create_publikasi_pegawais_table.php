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
        Schema::create('publikasi_pegawai', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedTinyInteger('ref_jenis_publikasi_id');
            $table->string('nama');
            $table->string('nip')->nullable();
            $table->string('berkas_foto');

            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('deleted_by')->nullable();

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
        Schema::dropIfExists('publikasi_pegawai');
    }
};
