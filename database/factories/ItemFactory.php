<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'completed' => false,
            'completed_at' =>  null,
        ];
    }
}
