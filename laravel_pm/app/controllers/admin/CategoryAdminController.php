<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12/5/2014
 * Time: 1:09 AM
 */

class CategoryAdminController extends BaseController{

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
            $query = $query . "name Like ?";
            $text = trim(Input::get("searchText"));
            array_push($array, "%" . $text . "%");
        }
        $categories = null;
        $total = 0;
        if (count($array) > 0) {
            $categories = Category::whereRaw($query, $array)->take($max)->skip($offset);
            $total = Category::whereRaw($query, $array)->count();
        } else {
            $categories = Category::take($max)->skip($offset)->orderBy('id', "ASC");
            $total = Category::count();
        }
        $categories = $categories->get();
        return View::make("categoryAdmin.tableView", array(
            'categories' => $categories,
            'total' => $total,
            'max' => $max,
            'offset' => $offset,
            'searchText' => $text
        ));
    }

    public function getCreate() {
        $category = null;
        if(Input::get("id")) {
            $category = Category::find(intval(Input::get("id")));
        } else {
            $category = new Category();
        }
        return View::make("categoryAdmin.create", array('category' => $category));
    }

    public function postSave() {
        $category = null;
        $inputs = Input::all();
        if($inputs["id"]) {
            $category = Category::find(intval($inputs["id"]));
        } else {
            $category = new Category();
        }
        $rules = array(
            'name' => 'required|min:5|unique:categories,name'.($category->id ? ",$category->id" : "")
        );
        $validator = Validator::make($inputs, $rules);
        if($validator->fails()) {
            return array('status' => 'error', 'message' => $validator->messages()->all());
        }
        $category->name = $inputs["name"];
        $category->save();
        return array('status' => 'success', 'message' => "Category has been created successfully");
    }
} 