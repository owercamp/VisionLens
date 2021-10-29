<?php

namespace Database\Factories;

use App\Models\Sales;
use Illuminate\Database\Eloquent\Factories\Factory;

class SalesFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Sales::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      "sal_ide" => $this->faker->numberBetween($min = 100000000, $max = 9999999999),
      "sal_name" => $this->faker->name(),
      "sal_pho" => $this->faker->numerify('(###) #######'),
      "sal_add" => $this->faker->streetAddress(),
      "sal_fact" => $this->faker->numerify('VL-######'),
      "sal_ema" => $this->faker->email(),
      "sal_total" => $this->faker->numberBetween($min = 10000, $max = 150000),
      "sal_qua" => $this->faker->numberBetween($min = 1, $max = 24),
      "sal_vqua" => $this->faker->numberBetween($min = 10000, $max = 150000),
      "sal_obs" => $this->faker->text()
    ];
  }
}
