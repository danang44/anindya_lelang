<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNgistMastLelangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ngist_mast_lelang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lelang');
            $table->string('tgl_mulai');
            $table->string('tgl_akhir');
            $table->string('desc');
            $table->string('scope');
            $table->string('harga');
            $table->string('created_by');
            $table->string('is_active');
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
        Schema::dropIfExists('ngist_mast_lelang');
    }
}
