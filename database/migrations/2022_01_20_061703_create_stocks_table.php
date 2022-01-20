<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis');
            $table->foreignId('sandi_kantor');
            $table->timestamp('tanggal');
            $table->bigInteger('jml_stok_awal');
            $table->bigInteger('tambahan_stok');
            $table->bigInteger('jml_digunakan');
            $table->bigInteger('jml_rusak');
            $table->bigInteger('jml_hilang');
            $table->bigInteger('jml_stok_akhir');
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
        Schema::dropIfExists('stocks');
    }
}
