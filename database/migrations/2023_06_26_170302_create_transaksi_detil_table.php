<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiDetilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_detil', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('autonumber_id');
            $table->string('kodekategori');
            $table->integer('qty');
            $table->string('satuan');
            $table->decimal('harga', 8, 2);
            $table->timestamps();

            $table->foreign('autonumber_id')->references('id')->on('transaksi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_detil');
    }
}
