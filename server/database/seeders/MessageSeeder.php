<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Message;
use App\Models\Property;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::factory() -> count(100) -> make() -> each(function($message) {

            // Associa ogni messaggio con una proprietà random
            $property = Property :: inRandomOrder() -> first();
            $message -> property() -> associate($property);

            $message -> save();

        });
    }
}
