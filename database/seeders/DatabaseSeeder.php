<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Kreiram jednog specifičnog korisnika sa mojim imenom i email-om
        \App\Models\User::factory()->create([
            'name' => 'Zeljko Beratovic',
            'email' => 'zeljkoberatovic@gmail.com',
        ]);

        // Kreiram dodatnih 300 nasumičnih korisnika pomoću factory
        \App\Models\User::factory(300)->create();

        // Dohvatam sve korisnike i nasumično ih mešam
        $users = \App\Models\User::all()->shuffle();

        // Kreiram 20 poslodavaca i svakom dodeljujem nasumičnog korisnika
        for ($i = 0; $i < 20; $i++) {
            \App\Models\Employer::factory()->create([
                'user_id' => $users->pop()->id // Uzimam jednog korisnika iz liste
            ]);
        }

        // Dohvatam sve poslodavce iz baze
        $employers = \App\Models\Employer::all();

        // Kreiram 100 poslova, dodeljujući svakom nasumičnog poslodavca
        for ($i = 0; $i < 100; $i++) {
            \App\Models\Job::factory()->create([
                'employer_id' => $employers->random()->id // Nasumično biram poslodavca
            ]);
        }

        // Za svakog preostalog korisnika kreiram nasumične prijave na poslove
        foreach ($users as $user) {
            // Biram 0 do 4 nasumičnih poslova za svakog korisnika
            $jobs = \App\Models\Job::inRandomOrder()->take(rand(0, 4))->get();

            // Kreiram prijave za izabrane poslove
            foreach ($jobs as $job) {
                \App\Models\JobApplication::factory()->create([
                    'job_id' => $job->id,     // Postavljam ID posla
                    'user_id' => $user->id    // Postavljam ID korisnika
                ]);
            }
        }
    }
}
