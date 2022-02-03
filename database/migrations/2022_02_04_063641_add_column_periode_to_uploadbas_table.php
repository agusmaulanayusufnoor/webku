<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnPeriodeToUploadbasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uploadbas', function (Blueprint $table) {
            $table->string('periode',30)->after('namafile');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('uploadbas', function (Blueprint $table) {
            //
            $table->dropColumn('periode');
        });
    }
}
