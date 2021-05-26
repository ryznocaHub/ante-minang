<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryBahanBakusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_bahan_bakus', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->text('keterangan');
            $table->string('kategori');
            $table->timestamp('tanggal')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_bahan_bakus');
    }
}
