<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $model  = new User();
        $model->first_name = 'John';
        $model->last_name = "doe";
        $model->email = "john@gmail.com";
        $model->password = Hash::make("password");
        $model->save();

        $model  = new User();
        $model->first_name = 'John';
        $model->last_name = "doe";
        $model->email = "win@gmail.com";
        $model->password = Hash::make("password");
        $model->save();
    }
}
