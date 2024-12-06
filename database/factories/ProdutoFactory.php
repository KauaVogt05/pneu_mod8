<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    protected $model = \App\Models\Produto::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->word(),
            'preco' => $this->faker->randomFloat(2, 10, 100000), // Valores entre 10 e 1000
            'img' => $this->faker->imageUrl(640, 480, 'products', true, 'Produto'), // Gera URL de imagem fake
            'descricao' => $this->faker->paragraph(),
            'marca' => $this->faker->company(),
            'aro' => $this->faker->randomFloat(2, 10, 30), // Exemplo de tamanhos de aro
        ];
    }
}
