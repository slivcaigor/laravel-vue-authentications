<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\View;
use App\Models\Property;

class ViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        View::factory() -> count(100) -> make() -> each(function($view) {

            // Associa ogni view con una proprietà random
            $property = Property :: inRandomOrder() -> first();
            $view -> property() -> associate($property);

            $view -> save();

        });
    }
}
