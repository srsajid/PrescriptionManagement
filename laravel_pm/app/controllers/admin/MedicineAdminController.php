<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/5/2014
 * Time: 1:09 AM
 */

class MedicineAdminController extends BaseController{

    public function getTableView() {
        $max = Input::get("max") ? intval(Input::get("max")) : 10;
        $offset = Input::get("offset") ? intval(Input::get("offset")) : 0;
        $array = array();
        $query = "";
        $text = "";
        if (Input::get("searchText")) {
            $query = $query . "name Like ?";
            $text = trim(Input::get("searchText"));
            array_push($array, "%" . $text . "%");
        }
        $categories = null;
        $total = 0;
        if (count($array) > 0) {
            $categories = Medicine::whereRaw($query, $array)->take($max)->skip($offset);
            $total = Medicine::whereRaw($query, $array)->count();
        } else {
            $categories = Medicine::take($max)->skip($offset)->orderBy('id', "ASC");
            $total = Medicine::count();
        }
        $categories = $categories->get();
        return View::make("medicineAdmin.tableView", array(
            'categories' => $categories,
            'total' => $total,
            'max' => $max,
            'offset' => $offset,
            'searchText' => $text
        ));
    }

    public function getCreate() {
        $medicine = null;
        if(Input::get("id")) {
            $medicine = Medicine::find(intval(Input::get("id")));
        } else {
            $medicine = new Medicine();
        }
        $categories = Category::lists("name", "id");
        return View::make("medicineAdmin.create", array('medicine' => $medicine, 'categories' => $categories));
    }

    public function postSave() {
        $medicine = null;
        $inputs = Input::all();
        if($inputs["id"]) {
            $medicine = Medicine::find(intval($inputs["id"]));
        } else {
            $medicine = new Medicine();
        }
        $rules = array(
            'name' => 'required|min:5|unique:categories,name'.($medicine->id ? ",$medicine->id" : "")
        );
        $validator = Validator::make($inputs, $rules);
        if($validator->fails()) {
            return array('status' => 'error', 'message' => $validator->messages()->all());
        }
        $medicine->name = $inputs["name"];
        $medicine->code = $inputs["code"];
        $medicine->company = $inputs["company"];
        $medicine->category_id = $inputs["category_id"];
        $medicine->save();
        return array('status' => 'success', 'message' => "Medicine has been created successfully");
    }
} 