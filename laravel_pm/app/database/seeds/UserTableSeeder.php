<?php
/**
 * Created by IntelliJ IDEA.
 * User: User
 * Date: 13/Jan/2015
 * Time: 1:50 PM
 */

class UserTableSeeder extends Seeder {
    public function run() {
        $user = new User();
        $user->username = "admin";
        $user->password = Hash::make("admin");
        $user->save();
    }    
}