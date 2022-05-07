<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateLanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'name'=>'English',
            'iso'=>'en'
        ]); 
        Language::create([
            'name'=>'Français',
            'iso'=>'fr'
        ]);
    }
}
