<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPontosTuristicosSaoJoao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Inserir os pontos turísticos na tabela 'locais'
        DB::table('locals')->insert([
            ['nome_local' => 'Igreja de São Francisco de Assis', 'endereco' => 'Praça Frei Orlando, s/n'],
            ['nome_local' => 'Igreja de Nossa Senhora do Pilar', 'endereco' => 'Rua Getúlio Vargas, 99'],
            ['nome_local' => 'Igreja de Nossa Senhora do Carmo', 'endereco' => 'Praça Carlos Gomes, s/n'],
            ['nome_local' => 'Catedral Basílica de Nossa Senhora do Pilar', 'endereco' => 'Praça Frei Orlando, s/n'],
            ['nome_local' => 'Museu de Arte Sacra', 'endereco' => 'Rua Getúlio Vargas, 99'],
            ['nome_local' => 'Museu Ferroviário', 'endereco' => 'Praça Carlos Gomes, s/n'],
            ['nome_local' => 'Museu Regional de São João del Rei', 'endereco' => 'Rua Marechal Deodoro, 12'],
            ['nome_local' => 'Teatro Municipal', 'endereco' => 'Rua Getúlio Vargas, 146'],
            ['nome_local' => 'Solar dos Neves', 'endereco' => 'Rua Getúlio Vargas, 114'],
            ['nome_local' => 'Chafariz da Legalidade', 'endereco' => 'Praça do Chafariz, s/n'],
            ['nome_local' => 'Cemitério do Carmo', 'endereco' => 'Rua Cemitério, s/n'],
            ['nome_local' => 'Rua das Casas Tortas', 'endereco' => 'Rua Getúlio Vargas, 160'],
            ['nome_local' => 'Ponte do Rosário', 'endereco' => 'Rua Getúlio Vargas, 200'],
            ['nome_local' => 'Maria Fumaça', 'endereco' => 'Estação Ferroviária, s/n'],
            ['nome_local' => 'Largo do Rosário', 'endereco' => 'Largo do Rosário, s/n'],
            ['nome_local' => 'Largo do Carmo', 'endereco' => 'Largo do Carmo, s/n'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remover os pontos turísticos adicionados
        DB::table('locais')->whereIn('nome_local', [
            'Igreja de São Francisco de Assis',
            'Igreja de Nossa Senhora do Pilar',
            'Igreja de Nossa Senhora do Carmo',
            'Catedral Basílica de Nossa Senhora do Pilar',
            'Museu de Arte Sacra',
            'Museu Ferroviário',
            'Museu Regional de São João del Rei',
            'Teatro Municipal',
            'Solar dos Neves',
            'Chafariz da Legalidade',
            'Cemitério do Carmo',
            'Rua das Casas Tortas',
            'Ponte do Rosário',
            'Maria Fumaça',
            'Largo do Rosário',
            'Largo do Carmo',
        ])->delete();
    }
}
