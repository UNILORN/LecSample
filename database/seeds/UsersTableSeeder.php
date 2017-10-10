<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');

        DB::table('m_user')->delete();
        DB::table('m_user_address')->delete();

        $user = [];
        foreach (range(1,150) as $val){
            $user[] = [
                'id'=>$val,
                'name'=>$faker->name,
                'email'=>$faker->email,
                'password'=>encrypt($val),
                'tel'=>implode(explode("-", $faker->phoneNumber))
            ];
        }
        DB::table('m_user')->insert($user);

        $user_address = [];
        foreach (range(1,150) as $user_val){
            foreach (range(1,4) as $val){
                $user_address[] = [
                    'user_id'=>$user_val,
                    'postcode'=>$faker->postcode,
                    'prefectures'=>$faker->company,
                    'municipality'=>$faker->city,
                    'address'=>$faker->streetAddress
                ];
            }
        }
        DB::table('m_user_address')->insert($user_address);
    }
}
