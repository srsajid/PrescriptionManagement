<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18/Jan/2015
 * Time: 9:17 PM
 */

class Admin extends  Eloquent {
    protected $table = "admins";

    public function user() {
        return $this->morphOne("User", "userable");
    }
}