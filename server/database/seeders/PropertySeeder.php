<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Property;
use App\Models\User;
use App\Models\Service;
use App\Models\Sponsorship;


class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Property::factory() -> count(100) -> make() -> each(function($property) {

            // Associa ogni proprietà con uno user random
            $user = User :: inRandomOrder() -> first();
            $property -> user() -> associate($user);

            $property -> save();

            // NaM
            $services = Service :: inRandomOrder() -> limit(rand(1, 20)) -> get();
            $property -> services() -> sync($services);

            $sponsorships = Sponsorship :: inRandomOrder() -> first();
            $property -> sponsorships() -> sync($sponsorships);

        });
    }
}