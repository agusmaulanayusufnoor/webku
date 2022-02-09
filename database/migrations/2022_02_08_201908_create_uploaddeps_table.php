<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploaddepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploaddeps', function (Blueprint $table) {
          $table->id();
          $table->foreignId('kantor_id');
          $table->string('no_rekening',13)->unique();
          $table->string('periode',30);
          $table->string('namafile',100);
          $table->string('file',100);
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
        Schema::dropIfExists('uploaddeps');
    }
}