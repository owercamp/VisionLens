<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var string
   */
  protected $model = Client::class;

  /**
   * Define the model's default state.
   *
   * @return array
   */
  public function definition()
  {
    return [
      "cli_name" => $this->faker->name(),
      "cli_ide" => $this->faker->numberBetween($min = 100000000, $max = 9999999999),
      "cli_add" => $this->faker->streetAddress(),
      "cli_pho" => $this->faker->numerify('(###) #######'),
      "cli_ref" => "Visión lens",
      "cli_ema" => $this->faker->email()
    ];
  }
}
