<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCatatanTable extends Migration
{
    public function up()
    {
        Schema::create('catatan', function (Blueprint $table) {
            $table->id('id');
            $table->string('text');
            $table->timestamps();
        });

        DB::table('catatan')->insert([
            'text' => 'Catatan 1',
        ]);
    }
    public function down()
    {
        Schema::dropIfExists('catatan');
    }
}
