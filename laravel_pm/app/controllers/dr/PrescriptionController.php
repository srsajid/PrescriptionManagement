<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 18/Jan/2015
 * Time: 9:43 PM
 */

class PrescriptionController extends BaseController {

    public function getTableView() {
        $max = Input::get("max") ? intval(Input::get("max")) : 10;
        $offset = Input::get("offset") ? intval(Input::get("offset")) : 0;
        $array = array();
        $query = "";
        $text = "";
        if (Input::get("searchText")) {
            $query = $query . "patient_name Like ?";
            $text = trim(Input::get("searchText"));
            array_push($array, "%" . $text . "%");
        }
        $prescriptions = null;
        $total = 0;
        if (count($array) > 0) {
            $prescriptions = Prescription::whereRaw($query, $array)->take($max)->skip($offset);
            $total = Prescription::whereRaw($query, $array)->count();
        } else {
            $prescriptions = Prescription::take($max)->skip($offset)->orderBy('id', "ASC");
            $total = Prescription::count();
        }
        $prescriptions = $prescriptions->get();
        return View::make("prescription.tableView", array(
            'prescriptions' => $prescriptions,
            'total' => $total,
            'max' => $max,
            'offset' => $offset,
            'searchText' => $text
        ));
    }
}