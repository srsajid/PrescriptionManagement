<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 23/Jan/2015
 * Time: 12:23 PM
 */

class PrescriptionItem extends Eloquent {
    public $timestamps = false;
    protected $table = "prescription_items";

    public function prescription() {
        return $this->belongsTo("Prescription", "prescription_id");
    }

    public function medicine() {
        return $this->belongsTo("Medicine", "medicine_id");
    }
}