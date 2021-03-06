<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class abdallahAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->rule_id = 1;
        $user->name = "abdallah";
        $user->email = "abdallah@gmail.com";
        $user->password = bcrypt("abdallah123");
        $user->save();
    }
}
