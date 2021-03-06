<?php

use App\Rule;
use Illuminate\Database\Seeder;

class RulesInit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
        $rules = array("admin","manager","cashier","client");   
        for($i=0;$i<=3;$i++){
            $rule = new Rule();
            $rule->rule = $rules[$i];
            $rule->save();
        }
    }
}
