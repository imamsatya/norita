<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->timestamps();
        });

          Schema::table('kategori_subscribers', function (Blueprint $table){
                $table->integer('customer_id')->unsigned()->nullable();
                $table->foreign('customer_id')->references('id')->on('customers');
                
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kategori_subscribers');
    }
}
