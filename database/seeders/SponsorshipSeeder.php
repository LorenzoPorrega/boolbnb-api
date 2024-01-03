<?php

namespace Database\Seeders;

use App\Models\Sponsorship;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sponsorships = [
            [
                "name" => "Silver",
                "price" => "2,99",
                "duration_hours" => "24",
                "icon_url" => ""
            ],
            [
                "name" => "Gold",
                "price" => "5,99",
                "duration_hours" => "72",
                "icon_url" => ""
            ],
            [
                "name" => "Platinum",
                "price" => "9,99",
                "duration_hours" => "144",
                "icon_url" => ""
            ]
        ];

        foreach ($sponsorships as $singleSponsorship) {
            Sponsorship::create([
                "name" => $singleSponsorship["name"],
                "price" => $singleSponsorship["price"],
                "duration_hours" => $singleSponsorship["duration_hours"],
                "icon_url" => $singleSponsorship["icon_url"]
            ]);
        }
    }
}
