<?php

namespace Database\Factories;

use App\Models\Tabungan;
use Illuminate\Database\Eloquent\Factories\Factory;

class TabunganFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tabungan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nasabah' => $this->faker->randomDigitNotNull,
        'jenisTransaksi' => $this->faker->word,
        'date' => $this->faker->word,
        'time' => $this->faker->word,
        'jumlah' => $this->faker->randomDigitNotNull,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
