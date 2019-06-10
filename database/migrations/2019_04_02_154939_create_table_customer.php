<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('cuci', function (Blueprint $table) {
          $table->increments('no_transaksi');
          $table->unsignedInteger('id_customer')->nullable();
          $table->unsignedInteger('kd_pakaian')->nullable();
          $table->string('nama_customer');
          $table->string('no_telp',12);
          $table->string('alamat');
          $table->string('jenis_cucian');
          $table->unsignedInteger('berat_pakaian');
          $table->string('jenis_pengharum');
          $table->string('jenis_pelayanan');
          $table->unsignedInteger('harga');
          $table->date('tgl_terima');
          $table->date('tgl_selesai');
      });
      Schema::create('pakaian', function (Blueprint $table) {
          $table->increments('kd_pakaian');
          $table->string('jenis_cucian');
          $table->unsignedInteger('berat_pakaian');
          $table->string('jenis_pengharum');
          $table->string('jenis_pelayanan');
          $table->unsignedInteger('harga');
      });
      Schema::create('customers', function(Blueprint $kolom) {
        $kolom->increments('id_customer');
        $kolom->string('nama_customer');
        $kolom->string('alamat');
        $kolom->string('no_telp',12);
      });

      Schema::table('cuci', function(Blueprint $kolom){
        $kolom->foreign('id_customer')->references('id_customer')->on('customers')->onDelete('cascade')->onUpdate('cascade');
        $kolom->foreign('kd_pakaian')->references('kd_pakaian')->on('pakaian')->onDelete('cascade')->onUpdate('cascade');
      });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('customers');
      Schema::dropIfExists('cuci');
      Schema::dropIfExists('pakaian');

    }
}
