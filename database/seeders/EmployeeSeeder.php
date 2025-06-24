<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'name' => 'John Doe',
            'phone' => '123455678904',
            'personal_email' => 'john.doe6@example.com',
            'office_email' => 'john.office66@example.com',
            'gender' => 'male',
            'dob' => '1990-01-01',
            'joining_date' => '2020-01-01',
            'designation_id' => 1, // Assuming 1 exists in your designations table
            'address' => '123 Main St, Anytown, USA',
            'bank_name' => 'Bank of America',
            'account_no' => '12345676890',
            'ifsc' => 'BOFAUS3N',
            'photo' => 'BOFAUS3N',
            'id_proof' => 'BOFAUS3N',
            // Add photo and id_proof fields if necessary
        ]);
    }
}
