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
        Schema::create('inventory_fermentables', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class, 'user_id');
            $table->integer('shared_f_id')->nullable();
            $table->float('price');
            $table->float('quantity');
            $table->string("currency");
            $table->string('name');
            $table->foreignIdFor(\App\Models\FermentableBrand::class, 'brand_id');
            $table->string('form');/*malt,grain,dry extract, liquid extract, sugar, other*/
            $table->string('type');
            $table->string('raw_ingredient');
            $table->float('potential');/*PKL*/
            $table->float('color');
            $table->float('diastatic_power')->nullable(); //lintner
            $table->float('ph')->nullable();
            $table->string('link')->nullable();
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
        Schema::dropIfExists('inventory_fermentables');
    }
};
