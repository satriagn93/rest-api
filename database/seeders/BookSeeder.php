<?php

namespace Database\Seeders;

use App\Models\BookModel;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BookModel::truncate();
        BookModel::create([
            'title' => 'CRUD Laravel',
            'description' => 'Mempelajari Laravel dari Nol'
        ]);
        BookModel::create([
            'title' => 'Node Js',
            'description' => 'Mempelajari NodeJs dari Nol'
        ]);
        BookModel::create([
            'title' => 'Frontend',
            'description' => 'Pekerjaan Frontend'
        ]);
        BookModel::create([
            'title' => 'Dev Ops',
            'description' => 'AWS Dev Ops'
        ]);
    }
}
