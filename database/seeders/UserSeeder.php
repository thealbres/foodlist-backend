<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'name' => 'Admin',
                'email' => 'admin@food.com',
                'birthday' => '04041997',
                'height'=>'183',
                'type'=>'admin', 
                'gender'=>'masc',
                'password' => Hash::make('qwer1234')
            ],
            [
                'name' => 'Client',
                'email' => 'client@food.com',
                'birthday' => '04041997',
                'height'=>'183',
                'type'=>'client', 
                'gender'=>'masc',
                'password' => Hash::make('qwer1234')
            ]
        ];

        foreach($arr as $key=>$item){
            $user = User::create($item);
        }
    }
}
