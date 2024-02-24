<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Disciplinas;

class DisciplinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $nomes_discip = [
            'Arte', 'Biologia', 'Educação Física', 'Filosofia', 'Física',
            'Geografia', 'História', 'Interpretação de texto', 'Língua Inglesa',
            'Língua Portuguesa', 'Matemática', 'Projeto de Vida', 'Química', 'Redação', 'Sociologia'
        ];

        foreach ($nomes_discip as $nome) {
            Disciplinas::create(['nome' => $nome, 'status' => '1']);
        }

    }
}
