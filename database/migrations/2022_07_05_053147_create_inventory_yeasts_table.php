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
        Schema::create('inventory_yeasts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class, 'user_id');
            $table->integer('shared_y_id')->nullable();
            $table->float('price');
            $table->float('quantity');
            $table->string("currency");
            $table->date('manufacturing_date')->nullable();
             $table->json("locked")->default('[]');
            $table->string('name', 50);
            $table->string('manufacturer',50);
            $table->string('unit',10);
            $table->float('cells_per_unit');
            $table->string('target', 50);
            $table->string('form', 25);
            $table->float('ideal_min_temperature');
            $table->float('ideal_max_temperature');
            $table->float('max_temperature');
            $table->float('min_temperature');
            $table->string('floculation');
            $table->string('alcool_tolerance');
            $table->float('attenuation');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('inventory_yeasts');
    }
};
