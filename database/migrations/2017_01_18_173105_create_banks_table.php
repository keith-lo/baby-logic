<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
{
    private $tables = ['bank', 'bank_type'];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach( $this->tables as $table ){
            Schema::create($table, function (Blueprint $table){
                $table->increments('id');
                $table->string('name', 100);
                $table->integer('orderNumber', false, true)->default(0);
                $table->boolean('isDeleted')->default(false);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach( $this->tables as $table ){
            Schema::dropIfExists($table);
        }
    }
}
