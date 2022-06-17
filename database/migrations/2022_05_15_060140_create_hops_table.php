<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hops', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('supplier,50');
            $table->string('code',10);//the iso code of the country
            $table->string('form',25);//pellet, cones, ...
            $table->string('purpose',25);
            $table->float('alpha');
            $table->integer('harvest');//the harvest year
            $table->text('aromas')->nullable();
            $table->text('alternatives')->nullable();
            $table->text('notes')->nullable();

            $table->text('log')->nullable();


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
        Schema::dropIfExists('hops');
    }
};
