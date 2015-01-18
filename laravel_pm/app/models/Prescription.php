<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18/Jan/2015
 * Time: 9:56 PM
 */

class Prescription extends Eloquent {
    protected $table = "prescriptions";

    public function medicines() {
        return $this->belongsToMany("Medicine", "prescription_medicine", "prescription_id", "medicine_id");
    }
}