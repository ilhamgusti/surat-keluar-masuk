<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = [
            ['name' => 'Control Unit', 'email' => 'controlunit@mail.com', 'role' => 1],
            ['name' => 'SPV', 'email' => 'spv@mail.com', 'role' => 2],
            ['name' => 'Manager', 'email' => 'manager@mail.com', 'role' => 3],
            ['name' => 'Direktur', 'email' => 'direktur@mail.com', 'role' => 4],
            ['name' => 'Vendor', 'email' => 'vendor@mail.com', 'role' => 5],
            ['name' => 'Keuangan', 'email' => 'keuangan@mail.com', 'role' => 6],
        ];

        foreach ($users as $user) {
            factory(App\User::class)->create([
                'name' => $user['name'],
                'email' => $user['email'],
                'role' => $user['role']
            ]);
        }
    }
}
