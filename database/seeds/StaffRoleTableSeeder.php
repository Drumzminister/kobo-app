<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = collect([
            'Manager', 'Secretary', 'Office Assistant', 'Human Resource', 'Personal Assistant',
            'Cleaner', 'Developer', 'Accountant', 'Data Entry', 'Reception', 'HR', 'Sales',
            'Driver', 'Typist', 'Executive/Personal Assistant',
        ]);

        $staffRole = $role->random();
        DB::table('staff_role')->insert([
            'name' => $staffRole
        ]);
    }
}
