<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
class alternatif extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatif', function (Blueprint $table) {
            $table->id();
            
            $table->string('nama_alternatif');
            $table->integer('sanksi_berorganisasi');
            $table->integer('status_keanggotaan');
            $table->integer('keaktifan');
            $table->integer('pengalaman');
            $table->integer('ijdk');
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
      //  Schema::drop('flights');
    }
}