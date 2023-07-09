<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $model = new Employee();
        $model->first_name = "john";
        $model->last_name = "doe";
        $model->email = "john@example.com";
        $model->phone = "081477084165";
        $model->gender = "laki laki";
        $model->address = "solo";
        $model->save();
    }
}
