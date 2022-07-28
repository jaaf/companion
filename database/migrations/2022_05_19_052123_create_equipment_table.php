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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class, 'user_id');
            $table->string('name',25);
            $table->string('type',25);
            $table->float('hop_absorption');
            $table->float('grain_absorption');
            $table->float('altitude');
           

            $table->float('mash_tun_capacity')->nullable();//doesn't exist for all in one equipment – liters
            $table->float('mash_tun_undergrain_volume');
            $table->float('mash_tun_retention')->nullable();//doesn't exist for all in one equipment – liters
            $table->float('mash_tun_thermal_losses');//doesn't exist for all in one equipment — °C/hour
            $table->float('mash_tun_heat_capacity_equiv');//given in equivalent grain mass kg
            $table->float('mash_thickness');
            $table->float('mash_efficiency');


            $table->float('boiler_capacity');// liters
            $table->float('boiler_retention');// liters
            $table->float('boiler_evaporation_rate');// liters/hour

            $table->float('fermenter_capacity');// the volume you can put into the first fermenter – liters
            $table->float('fermenter_retention');//the volume that remains in the last (or in all the) fermenter(s) - liters

            $table->float('k_mash_hopping')->nullable();
            $table->float('k_first_wort_hopping')->nullable();
            $table->float('k_boil_hopping')->nullable();
            $table->float('k_hop_stand_hopping')->nullable();
            $table->float('k_dry_hopping')->nullable();
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
        Schema::dropIfExists('equipment');
    }
};
