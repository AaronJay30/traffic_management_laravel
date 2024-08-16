<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(30)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $barangay =[
        [ 'location' => 'Caanawan','recovered' => 0,'quarantined' => 0,'active' => 0], [ 'location' => 'Abar 1st','recovered' => 0, 'quarantined' => 0, 'active' => 0 ], [ 'location' => 'Abar 2nd','recovered' => 0, 'quarantined' => 0, 'active' => 0 ],  [ 'location' => 'Calaocan','recovered' => 0, 'quarantined' => 0, 'active' => 0 ], [ 'location' => 'FE Marcos','recovered' => 0, 'quarantined' => 0, 'active' => 0 ]];
        $traffic =[
        [ 'location' => 'Caanawan','state' => 'OFF'],
        [ 'location' => 'Abar 1st','state' => 'OFF'], 
        [ 'location' => 'Abar 2nd','state' => 'OFF'],
        [ 'location' => 'Calaocan','state' => 'OFF'],
        [ 'location' => 'FE Marcos','state' => 'OFF']];

        DB::table('covids')->insert($barangay);
        DB::table('traffic')->insert($traffic);
    }
}
