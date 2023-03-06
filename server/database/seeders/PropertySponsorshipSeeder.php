<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sponsorship;
use App\Models\Property;

class PropertySponsorshipSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $properties = Property::all();
    $sponsorships = Sponsorship::all();

    // $exp_date = now()->addDays(rand(1,6)); // Set the expiry date to 6 months from now

    foreach ($properties as $property) {
      // Associate each property with a random sponsorship
      $property->sponsorships()->sync([
        $sponsorships->random()->id => [
          'exp_date' => now()->addDays(rand(1, 6))->format('Y-m-d')
        ]
      ]);
    }
  }
}