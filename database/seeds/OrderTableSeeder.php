<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');

        DB::table('t_order')->delete();
        DB::table('t_orderline')->delete();

        $order = [];
        $order_line = [];
        foreach (range(1,150) as $val){
            foreach (range(1,5) as $inner){
                $order[] = [
                    'id'=>(($val-1)*5)+$inner,
                    'order_at'=>$faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = date_default_timezone_get()),
                    'sum_price'=>mt_rand(1000,50000),
                    'order_num'=>uniqid(),
                    'user_id'=>$val,
                    'user_address_id'=>$val*$inner
                ];
                foreach (range(1,5) as $value){
                    $order_line[] = [
                        'order_id'=>(($val-1)*5)+$inner,
                        'product_id'=>mt_rand(1,150),
                        'price'=>mt_rand(1000,40000)
                    ];
                }
            }
        }
        DB::table('t_order')->insert($order);
        DB::table('t_orderline')->insert($order_line);
    }
}
