<?php


use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fermentables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
           $table->foreignIdFor(\App\Models\FermentableBrand::class,'brand_id');
            $table->string('form');/*malt,grain,dry extract, liquid extract, sugar, other*/
            $table->string('type');
            $table->string('raw_ingredient');
            $table->float('potential');/*PKL*/
            $table->float('color');
            $table->float('diastatic_power')->nullable();//lintner
            $table->float('ph')->nullable();
            $table->string('link')->nullable();
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
        Schema::dropIfExists('fermentables');
    }
};
