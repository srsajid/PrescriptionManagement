<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17/Jan/2015
 * Time: 4:16 PM
 */

class Doctor extends Eloquent {

    protected $table = "doctors";

    public function user() {
        return $this->morphOne("User", "userable");
    }

}