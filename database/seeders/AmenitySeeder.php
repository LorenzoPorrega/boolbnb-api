<?php

namespace Database\Seeders;

use App\Models\Amenity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AmenitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amenities = [ 
            $bathroom = [
                [
                    "name" => "Bath tub",
                    "icon" => "x"
                ],
                [
                    "name" => "Hair dryer",
                    "icon" => "x"
                ],
                [
                    "name" => "Cleaning products",
                    "icon" => "x"
                ],
                [
                    "name" => "Hot water",
                    "icon" => "x"
                ]
                ],
            
            $bedroom = [
                [
                    "name" => "Free washer – In unit",
                    "icon" => "x"
                ],
                [
                    "name" => "Hangers",
                    "icon" => "x"
                ],
                [
                    "name" => "Clothes drying rack",
                    "icon" => "x"
                ]
                ],
            
            $entertainment = [
                [
                    "name" => "Ethernet connection",
                    "icon" => "x"
                ],
                [
                    "name" => "TV",
                    "icon" => "x"
                ],
                [
                    "name" => "Sound system with Bluetooth and aux",
                    "icon" => "x"
                ]
                ],
            
            $family = [
                [
                    "name" => "High chair",
                    "icon" => "x"
                ],
                [
                    "name" => "Children’s tableware",
                    "icon" => "x"
                ],
                [
                    "name" => "Board games",
                    "icon" => "x"
                ]
                ],
            
            $air_system = [
                [
                    "name" => "Indoor fireplace",
                    "icon" => "x"
                ],
                [
                    "name" => "Central heating",
                    "icon" => "x"
                ],
                [
                    "name" => "Radiant heating",
                    "icon" => "x"
                ]
                ],
            
            $safety = [
                [
                    "name" => "Smoke alarm",
                    "icon" => "x"
                ],
                [
                    "name" => "Children’s tableware",
                    "icon" => "x"
                ],
                [
                    "name" => "Board games",
                    "icon" => "x"
                ]
                ],
            
            $family = [
                [
                    "name" => "High chair",
                    "icon" => "x"
                ],
                [
                    "name" => "Children’s tableware",
                    "icon" => "x"
                ],
                [
                    "name" => "Board games",
                    "icon" => "x"
                ]
                ]
            
            
            ];



            foreach ($amenities as $category => $amenity){
                foreach ($amenity as $service) {
                    Amenity::create([
                        "name" => $service["name"],
                        "icon" => $service["icon"],
                        "category" => key($amenity)
                    ]);
                }
                
            }
    }
}
