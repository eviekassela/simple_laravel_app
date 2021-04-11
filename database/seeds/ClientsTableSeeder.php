<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'name'       => 'Taylor',
            'surname'    => 'Otwell',
            'created_at' => '2020-01-01 00:00:01',
            'updated_at' => '2020-01-01 00:00:01',
        ]);
        Client::create([
            'name'       => 'Mohamed',
            'surname'    => 'Said',
            'created_at' => '2020-01-01 00:00:01',
            'updated_at' => '2020-01-01 00:00:01',
        ]);
        Client::create([
            'name'       => 'Jeffrey',
            'surname'    => 'Way',
            'created_at' => '2020-01-01 00:00:01',
            'updated_at' => '2020-01-01 00:00:01',
        ]);
        Client::create([
            'name'       => 'Phill',
            'surname'    => 'Sparks',
            'created_at' => '2020-01-01 00:00:01',
            'updated_at' => '2020-01-01 00:00:01',
        ]);
    }
}
