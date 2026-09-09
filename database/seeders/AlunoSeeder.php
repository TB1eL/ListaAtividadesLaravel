<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Aluno;
use Illuminate\Database\Seeder;

class AlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        public function run() {
            Aluno::factory()->count(10)->create(); // Exige criar a Factory também (php artisan make:factory AlunoFactory)
        }
    }
}
