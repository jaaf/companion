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
        Schema::create('user_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class,'user_id');
            $table->json('brands_fermentable')->default('[]');
            $table->json('types_fermentable')->default('[]');
            $table->json('raw_ingredients_fermentable')->default('[]');
            $table->string('fermentable_mass')->default('');
            $table->string('hop_mass')->default('');
            $table->string('volume')->default('');
            $table->string('temperature')->default('');
            $table->string('gravity')->default('');
            $table->string('color')->default('');
            $table->string('potential')->default('');
            $table->string('currency')->default('');
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
        Schema::dropIfExists('user_preferences');
    }
};
