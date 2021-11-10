<?php

namespace Database\Seeders;

use App\Models\Vacantunit;
use App\Models\VacanUnit;
use Illuminate\Database\Seeder;

class VacantUnittableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vacantseeder=[
            [
                'property_id'=>1,
            'unit'=>'unit one',
            'category'=> 'category one',
            'location'=>'thika ',
            'rent_amount'=>15000,
        ],
        [
            'property_id'=>2,
            'unit'=>'unit two',
            'category'=> 'category two',
            'location'=>'nairobi ',
            'rent_amount'=>25000,
        ],
        [
            'property_id'=>3,
            'unit'=>'unit three',
            'category'=> 'category three',
            'location'=>'nyeri ',
            'rent_amount'=>10000,
        ],
        [
            'property_id'=>4,
            'unit'=>'unit four',
            'category'=> 'category four',
            'location'=>'kiambu ',
            'rent_amount'=>70000,

        ],
        [
         'property_id'=>5,
        'unit'=>'unit five',
        'category'=> 'category five',
        'location'=>'mombass ',
        'rent_amount'=>33000,
    ],

        [ 'property_id'=>4,
        'unit'=>'unit six',
        'category'=> 'category six',
        'location'=>'mvita ',
        'rent_amount'=>2500,
    ],

        [ 'property_id'=>3,
        'unit'=>'unit seven',
        'category'=> 'category seven',
        'location'=>'mombass ',
        'rent_amount'=>3300,
    ],

        [ 'property_id'=>2,
        'unit'=>'unit eight',
        'category'=> 'category eight',
        'location'=>'kisumu ',
        'rent_amount'=>4400,
    ],

        [ 'property_id'=>1,
        'unit'=>'unit nine',
        'category'=> 'category nine',
        'location'=>'kwale ',
        'rent_amount'=>4500,
    ],

        [ 'property_id'=>5,
        'unit'=>'unit 10',
        'category'=> 'category ten',
        'location'=>'embakasi ',
        'rent_amount'=>40000,
    ],


        ];
        foreach($vacantseeder as $seeder){
            Vacantunit::create($seeder);
        }

    }
}