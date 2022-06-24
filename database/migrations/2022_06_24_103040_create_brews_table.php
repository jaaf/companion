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
        Schema::create('brews', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class, 'user_id');
            $table->string("name", 255);

            $table->string('author,50');
            $table->string('state', 25);
            $table->boolean('fermentables_withdrawn');
            $table->boolean('hops_withdrawn');
            //recipe like
            $table->string('type', 25);
            $table->float('batch_volume');
            $table->float('boil_time');
            $table->integer('equipment');
            $table->float('mash_efficiency');
            $table->float('original_gravity');
            $table->float('bitterness');
            $table->json('fermentables')->default('[]');
            $table->json('hops')->default('[]');
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
        Schema::dropIfExists('brews');
    }
};
