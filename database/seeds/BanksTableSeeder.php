<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = [
            ['name' => 'BOC', 'orderNumber' => 1],
            ['name' => 'HSBC', 'orderNumber' => 2],
            ['name' => 'Clinic Cash', 'orderNumber' => 3],
            ['name' => 'UnionPay', 'orderNumber' => 4],
        ];
        foreach( $banks as $bank ){
            DB::table('bank')->insert($bank);
        }

        $bank_types = [
            ['name' => 'ATM', 'orderNumber' => 1],
            ['name' => 'CQ', 'orderNumber' => 2],
            ['name' => 'Cash', 'orderNumber' => 3],
        ];
        foreach( $bank_types as $bank_type ){
            DB::table('bank_type')->insert($bank_type);
        }
        
    }
}
