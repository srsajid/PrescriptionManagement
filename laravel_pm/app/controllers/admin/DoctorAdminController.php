<?php
class DoctorAdminController extends BaseController {
    public function __construct() {
        $this->beforeFilter("admin");
    }

    public function getTableView() {
        $max = Input::get("max") ? intval(Input::get("max")) : 10;
        $offset = Input::get("offset") ? intval(Input::get("offset")) : 0;
        $array = array();
        $query = "";
        $text = "";
        if (Input::get("searchText")) {
            $query = $query . "title Like ?";
            $text = trim(Input::get("searchText"));
            array_push($array, "%" . $text . "%");
        }
        $doctors = null;
        $total = 0;
        if (count($array) > 0) {
            $doctors = Doctor::whereRaw($query, $array)->take($max)->skip($offset)->orderBy("id", "DESC");
            $total = Doctor::whereRaw($query, $array)->count();
        } else {
            $doctors = Doctor::take($max)->skip($offset)->orderBy('id', "DESC");
            $total = Doctor::count();
        }
        $doctors = $doctors->with("user")->get();
        return View::make("doctorAdmin.tableView", array(
            'doctors' => $doctors,
            'total' => $total,
            'max' => $max,
            'offset' => $offset,
            'searchText' => $text
        ));
    }

    public function getApprove() {
        $doctor = Doctor::find(intval(Input::get("id")));
        $doctor->user->is_active = true;
        $doctor->user->save();
        return array("status" => "success", 'message' => "Doctor has been approved successfully");
    }

    public function getDisapprove() {
        $doctor = Doctor::find(intval(Input::get("id")));
        $doctor->user->is_active = false;
        $doctor->user->save();
        return array("status" => "success", 'message' => "Doctor has been disapproved successfully");
    }
}