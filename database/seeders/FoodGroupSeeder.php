<?php

namespace Database\Seeders;

use App\Models\FoodGroup;

use Illuminate\Database\Seeder;

class FoodGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            [
                'name' => 'Carboidratos',
                'user_id' => '1',
            ],
            [
                'name' => 'Vegetais',
                'user_id'=>'1'
            ],
            [
                'name' => 'Carnes',
                'user_id'=>'1'
                
            ],
            [
                'name' => 'Cereais',
                'user_id'=>'1'
                
            ],  
        ];

        foreach($arr as $key=>$item){
            $user = FoodGroup::create($item);
        }
    }
}
