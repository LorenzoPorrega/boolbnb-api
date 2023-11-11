<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apartmentsTest = [
            [
                'title' => "Milano Centro 1",
                'slug' => 'test-1',
                'user_id' => "1",
                'address' => 'Milano',
                'price' => '25',
                'images' => ["apartments\/654fb735469bc.png"],
                'description' => 'milano centro 1', 
                'rooms_num' => '2',
                'beds_num' => '2',
                'bathroom_num' => '2',
                'visibility' => '1',
                'square_meters' => '25',
                'longitude' => '9.19',
                'latitude' =>'45.46'
            ],
            [
                'title' => "Milano Centro 2",
                'slug' => 'test-2',
                'user_id' => "1",
                'address' => 'Milano',
                'price' => '35',
                'images' => ["apartments\/654fb735469bc.png"],
                'description' => 'milano centro 2', 
                'rooms_num' => '2',
                'beds_num' => '2',
                'bathroom_num' => '2',
                'visibility' => '0',
                'square_meters' => '25',
                'longitude' => '9.19',
                'latitude' =>'45.46'
            ],
            [
                'title' => "Milano Centro 3",
                'slug' => 'test-3',
                'user_id' => "1",
                'address' => "Piazza Aspromonte, 20131 Milano",
                'price' => '45',
                'images' => ["apartments\/654fb735469bc.png"],
                'description' => 'milano centro 3', 
                'rooms_num' => '2',
                'beds_num' => '2',
                'bathroom_num' => '2',
                'visibility' => '1',
                'square_meters' => '25',
                'longitude' => '9.19',
                'latitude' =>'45.46'
            ],
            [
                'title' => "Vicino Milano 1",
                'slug' => 'test-4',
                'user_id' => "1",
                'address' => 'Milano',
                'price' => '25',
                'images' => ["apartments\/654fb89c10e90.jpg"],
                'description' => 'Vicino Milano 1', 
                'rooms_num' => '2',
                'beds_num' => '2',
                'bathroom_num' => '2',
                'visibility' => '0',
                'square_meters' => '25',
                'longitude' => '9.22',
                'latitude' =>'45.48'
            ],
            [
                'title' => "Vicino Milano 2",
                'slug' => 'test-5',
                'user_id' => "1",
                'address' => 'Milano',
                'price' => '25',
                'images' => ["apartments\/654fb89c10e90.jpg"],
                'description' => 'Vicino Milano 2', 
                'rooms_num' => '2',
                'beds_num' => '2',
                'bathroom_num' => '2',
                'visibility' => '1',
                'square_meters' => '35',
                'longitude' => '9.22',
                'latitude' =>'45.48'
            ],
            [
                'title' => "Vicino Milano 3",
                'slug' => 'test-6',
                'user_id' => "1",
                'address' => 'Milano',
                'price' => '25',
                'images' => ["apartments\/654fb89c10e90.jpg"],
                'description' => 'Vicino Milano 3', 
                'rooms_num' => '2',
                'beds_num' => '2',
                'bathroom_num' => '2',
                'visibility' => '0',
                'square_meters' => '45',
                'longitude' => '9.22',
                'latitude' =>'45.48'
            ],
            [
                'title' => "Torino Centro 1",
                'slug' => 'test-7',
                'user_id' => "1",
                'address' => 'Torino',
                'price' => '25',
                'images' => ["apartments\/654fb7f1264d9.png"],
                'description' => 'Torino Centro 1', 
                'rooms_num' => '2',
                'beds_num' => '2',
                'bathroom_num' => '2',
                'visibility' => '1',
                'square_meters' => '25',
                'longitude' => '7.68',
                'latitude' =>'45.07'
            ],
            [
                'title' => "Torino Centro 2",
                'slug' => 'test-8',
                'user_id' => "1",
                'address' => 'Torino',
                'price' => '25',
                'images' => ["apartments\/654fb7f1264d9.png"],
                'description' => 'Torino Centro 2', 
                'rooms_num' => '2',
                'beds_num' => '2',
                'bathroom_num' => '2',
                'visibility' => '0',
                'square_meters' => '35',
                'longitude' => '7.68',
                'latitude' =>'45.07'
            ],
            [
                'title' => "Torino Centro 3",
                'slug' => 'test-9',
                'user_id' => "1",
                'address' => 'Torino',
                'price' => '25',
                'images' => ["apartments\/654fb7f1264d9.png"],
                'description' => 'Torino Centro 3', 
                'rooms_num' => '2',
                'beds_num' => '2',
                'bathroom_num' => '2',
                'visibility' => '1',
                'square_meters' => '45',
                'longitude' => '7.68',
                'latitude' =>'45.07'
            ],
            ];

            foreach($apartmentsTest as $singleAp) {
                Apartment::create([
                    'title' => $singleAp['title'],
                    'slug' => $singleAp['slug'],
                    'user_id' => $singleAp['user_id'],
                    'address' => $singleAp['address'],
                    'price' => $singleAp['price'],
                    'images' => $singleAp['images'],
                    'description' => $singleAp['description'],
                    'rooms_num' => $singleAp['rooms_num'],
                    'beds_num' => $singleAp['beds_num'],
                    'bathroom_num' => $singleAp['bathroom_num'],
                    'visibility' => $singleAp['visibility'],
                    'square_meters' => $singleAp['square_meters'],
                    'longitude' => $singleAp['longitude'],
                    'latitude' =>$singleAp['latitude']
                ]);
            }

    }
}
