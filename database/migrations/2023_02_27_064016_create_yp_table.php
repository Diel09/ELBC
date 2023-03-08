<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yp', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('gender');
            $table->integer('age');
            $table->date('birthdate');
            $table->date('spiritbirth');
            $table->integer('points');
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
        Schema::dropIfExists('yp');
    }
}
