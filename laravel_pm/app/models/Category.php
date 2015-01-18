<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/5/2014
 * Time: 12:39 AM
 */

class Category extends Eloquent {
    public $timestamps = false;

    public function offers() {
        return $this->hasMany("Offer");
    }

    public function parent() {
        return $this->belongsTo("category", "category_id");
    }
} 