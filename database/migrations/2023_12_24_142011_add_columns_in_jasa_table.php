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
        Schema::table('jasa', function (Blueprint $table) {
            $table->string('peringkat')->after('nama_jasa');
            $table->string('penyelenggara')->after('peringkat');
            $table->year('tahun')->after('penyelenggara');
            $table->string('tema')->after('tahun');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('jasa', function (Blueprint $table) {
            //
        });
    }
};
