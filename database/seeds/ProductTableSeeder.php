<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');

        DB::table('m_product')->delete();

        $product = [];
        foreach (range(1,150) as $val){
            $product[] = [
                'id'=>$val,
                'name'=>$faker->word,
                'price'=>mt_rand(500,10000)
            ];
        }
        DB::table('m_product')->insert($product);
    }
}
