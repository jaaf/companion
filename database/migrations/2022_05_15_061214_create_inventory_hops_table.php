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
        Schema::create('inventory_hops', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class, 'user_id');
            $table->integer('shared_h_id')->nullable();
            $table->float('price');
            $table->float('quantity');
            $table->string("currency");
            $table->string('name', 50);
            $table->string('code', 10); //the iso code of the country
            $table->string('form', 25); //pellet, cones, ...
            $table->string('usage', 25);
            $table->float('alpha');
            $table->integer('harvest'); //the harvest year
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
        Schema::dropIfExists('inventory_hops');
    }
};
