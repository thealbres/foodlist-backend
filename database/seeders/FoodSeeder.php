<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Food;
class FoodSeeder extends Seeder
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
                'name' => 'Coxa de frango',
                'quantity' => '100',
                'calories' => '144',
                'user_id' => '1',
                'food_group_id' => '3',
            ],
            [
                'name' => 'Arroz Branco',
                'quantity' => '25',
                'calories' => '41',
                'user_id' => '1',
                'food_group_id' => '4',
            ],
            [
                'name' => 'Brócolis',
                'quantity' => '80',
                'calories' => '23',
                'user_id' => '1',
                'food_group_id' => '2',
                
            ],
            [
                'name' => 'Macarrão à carbonara',
                'quantity' => '100',
                'calories' => '362',
                'user_id' => '1',
                'food_group_id' => '1',
                
            ],  
        ];

        foreach($arr as $key=>$item){
            $user = Food::create($item);
        }
    }
}
