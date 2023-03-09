<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
            'name' => 'John',
            'email' => 'johndoe@gmail.com',
            'password' => Hash::make('10000'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'Bon',
            'email' => 'bonjovi@gmail.com',
            'password' => Hash::make('399'),
            'role' => 'user',
        ]);
        $faker = Faker::create();
        foreach (range(0, 12) as $_) {
            DB::table('restaurants')->insert([
                'title' => $faker->firstName(rand(0, 3) > 2 ? 'male' : 'female'),
                'address' => $faker->unique()->streetAddress,
                'code' => $faker->password(),
            ]);
        }
        $faker = Faker::create();
        foreach (range(0, 30) as $_) {
            DB::table('dishes')->insert([
                'title' => $faker->word() . '' . $faker->word(),
                'picture' => $faker->imageUrl(300, 300, 'food', true, 'Faker', rand(0, 1) > 0 ? true : false),
                'description' => $faker->sentence(rand(10, 30)),
                'restaurant_id' => rand(1, 12),

            ]);
        }
    }
}
