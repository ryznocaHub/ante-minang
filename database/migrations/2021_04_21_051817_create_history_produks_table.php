<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->references('id')->on('produks')->onDelete('set null');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('set null');
            $table->integer('jumlah');
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
        Schema::dropIfExists('history_produks');
    }
}
