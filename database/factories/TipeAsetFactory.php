<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TipeAsetModel;

class TipeAsetFactory extends Factory
{
    protected $model = TipeAsetModel::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama_tipe_asset' => $this->faker->name,
        ];
    }
}
