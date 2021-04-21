<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryManagementProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_management_produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produk_id')->references('id')->on('produks')->onDelete('set null');
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('aksi');
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
        Schema::dropIfExists('history_management_produks');
    }
}
