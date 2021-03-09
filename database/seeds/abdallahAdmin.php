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
        /*$user = new User();
        $user->rule_id = 1;
        $user->name = "abdallah";
        $user->email = "abdallah@gmail.com";
        $user->password = bcrypt("abdallah123");
        $user->save();*/
        $user = new User;
        $user->name =  "abdallah";
        $user->email =  "abdallah@gmail.com";
        $user->password = bcrypt("abdallah123");
        $user->api_token = str_random(60);
        $user->save();

        //$defaultRoles = $this->roleRepository->findByField('default', '1');
        //$defaultRoles = $defaultRoles->pluck('name')->toArray();
        //$defaultRoles = array('admin');
        $role = array('admin');
        $user->assignRole($role);
    }
}
