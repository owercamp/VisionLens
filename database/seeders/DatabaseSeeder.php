<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Client;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // \App\Models\User::factory(10)->create();

    User::create([
      'name' => 'Ower Campos',
      'email' => 'owerion22@gmail.com',
      'email_verified_at' => now(),
      'password' => \bcrypt('LoreCamiJuli1'),
      'remember_token' => Str::random(10),
    ]);

    // Client::factory(50)->create();
  }
}
