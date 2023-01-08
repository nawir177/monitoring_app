<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\leader;
use App\Models\progres;
use App\Models\Project;
use App\Models\TaskProject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(2)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // \App\Models\TaskProject::factory(5)->create();


        Leader::create([
            "nama"=>"Novalia Zahra",
            "email"=>"novalia123@gmail.com",
            "img"=> "leader-images/4UAoQ7HYV8LzEV1TZu6tMRePQUEO3ZEfTZlbrE9i.jpg"
        ]);

        Client::create([
            "client_name"=>"UNIVERSITAS ISLAM KALIMANTAN",
            "phone"=>"082251494208",
            "email"=>"uniska@gmail.com",
            "address"=>"jl. adhiyaksa banjarmasin utara"
        ]);

        Project::create([
            "leader_id" => 1,
            "client_id" => 1,
            "project-name" => "pembuatan SI Keuangan",
            "start-date" => "30 jan 2022",
            "end-date" => "14 Agu 2022",
            "progres" =>0


        ]);

        Project::create([
            "leader_id" => 1,
            "client_id" => 1,
            "project-name" => "Learning Management System",
            "start-date" => "12 jan 2022",
            "end-date" => "14 feb 2022",
            "progres" =>0
        ]);

        Project::create([
            "leader_id" => 1,
            "client_id" => 1,
            "project-name" => "SI Pendatann Management System",
            "start-date" => "11 jan 2022",
            "end-date" => "14 Agu 2022",
            "progres" =>0
        ]);
    }
}
