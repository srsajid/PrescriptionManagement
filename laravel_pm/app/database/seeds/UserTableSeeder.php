<?php
/**
 * Created by IntelliJ IDEA.
 * User: User
 * Date: 13/Jan/2015
 * Time: 1:50 PM
 */

class UserTableSeeder extends Seeder {
    public function run() {
        $admin = new Admin();
        $admin->name = "Administrator";
        $admin->email = "admin@srsajid.com";
        $admin->save();
        $user = new User();
        $user->username = "admin";
        $user->password = Hash::make("admin");
        $user->userable_type = "Admin";
        $user->userable_id = $admin->id;
        $user->save();
    }    
}