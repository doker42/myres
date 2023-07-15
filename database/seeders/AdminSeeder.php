<?php


namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => '$2y$10$Ca.nkMNS1AvFfagbk1nhgOEhFHYXuoaEhS/LeMhGHF.YGgthUMF0K', //demo1234
        ]);
    }
}
