<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run()
    {
        
        Task::create([
            'name' => 'Postular a trabajo',
            'description' => 'Enviar curriculum al trabajo ideal',
            'user_id' => 1,
        ]);

        Task::create([
            'name' => 'Crear proyecto',
            'description' => 'Levantar un proyecto en Laravel 9',
            'user_id' => 2,
        ]);

    }
}
