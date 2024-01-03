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
            "Bathroom" => [
                [
                    "name" => "Bath tub",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Hair dryer",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Cleaning products",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Hot water",
                    "icon" => "x",
                    "description" => ""
                ]
            ],

            "Bedroom and laundry" => [
                [
                    "name" => "Free washer – In unit",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Hangers",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Clothes drying rack",
                    "icon" => "x",
                    "description" => ""
                ]
            ],

            "Entertainment" => [
                [
                    "name" => "Ethernet connection",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "TV",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Sound system with Bluetooth and aux",
                    "icon" => "x",
                    "description" => ""
                ]
            ],

            "Family" => [
                [
                    "name" => "High chair",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Children’s tableware",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Board games",
                    "icon" => "x",
                    "description" => ""
                ]
            ],

            "Heating and cooling" => [
                [
                    "name" => "Indoor fireplace",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Central heating",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Radiant heating",
                    "icon" => "x",
                    "description" => ""
                ]
            ],

            "Home safety" => [
                [
                    "name" => "Smoke alarm",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Children’s tableware",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Board games",
                    "icon" => "x",
                    "description" => ""
                ]
            ],

            "Internet and office" => [
                [
                    "name" => "High chair",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Children’s tableware",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Board games",
                    "icon" => "x",
                    "description" => ""
                ]
            ],

            "Kitchen and dining" => [
                [
                    "name" => "Kitchen",
                    "icon" => "x",
                    "description" => "Space where guests can cook their own meals"
                ],
                [
                    "name" => "Refrigerator",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Cooking basics",
                    "icon" => "x",
                    "description" => "Pots and pans, oil, salt and pepper"
                ],
                [
                    "name" => "Dishes and silverware",
                    "icon" => "x",
                    "description" => "Bowls, chopsticks, plates, cups, etc."
                ],
                [
                    "name" => "Freezer",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Dishwasher",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Induction cooker
                    ",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Oven",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Kettle",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Coffee maker: Nespresso",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Wine glasses",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Toaster",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Barbecue utensils",
                    "icon" => "x",
                    "description" => "Grill, charcoal, bamboo skewers/iron skewers, etc."
                ],
                [
                    "name" => "Dining table",
                    "icon" => "x",
                    "description" => ""
                ],
            ],
            "Location features" => [
                [
                    "name" => "Private entrance",
                    "icon" => "x",
                    "description" => "Separate street or building entrance"
                ]
            ],
            "Outdoor" => [
                [
                    "name" => "Patio or balcony",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Private back garden",
                    "icon" => "x",
                    "description" => "An open space on the property usually covered in grass"
                ],
                [
                    "name" => "Fire pit",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Outdoor furniture",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Outdoor dining area",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "BBQ grill",
                    "icon" => "x",
                    "description" => ""
                ]
            ],
            "Parking and facilities" => [
                [
                    "name" => "Free parking on premises",
                    "icon" => "x",
                    "description" => ""
                ]
            ],
            "Services" => [
                [
                    "name" => "Pets allowed",
                    "icon" => "x",
                    "description" => "Assistance animals are always allowed"
                ],
                [
                    "name" => "Long-term stays allowed",
                    "icon" => "x",
                    "description" => "Allow stays of 28 days or more"
                ],
                [
                    "name" => "Self check-in",
                    "icon" => "x",
                    "description" => ""
                ],
                [
                    "name" => "Lockbox",
                    "icon" => "x",
                    "description" => ""
                ],
            ]


        ];



        foreach ($amenities as $category => $amenity) {
            foreach ($amenity as $service) {
                Amenity::create([
                    "name" => $service["name"],
                    "icon" => $service["icon"],
                    "description" => $service["description"],
                    "category" => $category
                ]);
            }
        }
    }
}
