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
            $total = Prescription::whereRaw($query, $array)->where("doctor_id", '=', Auth::user()->userable_id)->count();
        } else {
            $prescriptions = Prescription::take($max)->skip($offset);
            $total = Prescription::where("doctor_id", '=', Auth::user()->userable_id)->count();
        }
        $prescriptions = $prescriptions->where("doctor_id", '=', Auth::user()->userable_id)->orderBy('id', "DESC")->get();
        return View::make("prescription.tableView", array(
            'prescriptions' => $prescriptions,
            'total' => $total,
            'max' => $max,
            'offset' => $offset,
            'searchText' => $text
        ));
    }

    public function getSelection() {
        $max = Input::get("max") ? intval(Input::get("max")): 10;
        $offset = Input::get("offset") ? intval(Input::get("offset")) : 0;
        $searchText = Input::get("searchText") ? Input::get("searchText") : "";
        $array = array();
        $query = "";
        $flag = false;
        if(Input::get("ingredient")) {
            $query = $query."ingredients Like ?";
            $text = trim(Input::get("ingredient")) ;
            array_push($array, "%".$text."%");
            $flag = true;
        }
        if(Input::get("category")) {
            $query = $flag ? $query." and " : $query;
            $query = $query."category_id = ?";
            array_push($array, Input::get("category"));
            $flag = true;
        }
        if(Input::get("company")) {
            $query = $flag ? $query." and " : $query;
            $query = $query."company = ?";
            array_push($array, Input::get("company"));
        }

        $products = null;
        $total = 0;
        if(count($array) > 0 ) {
            $products = Medicine::whereRaw($query, $array)->take($max)->skip($offset)->get();
            $total = Medicine::whereRaw($query, $array)->count();
        } else {
            $products = Medicine::take($max)->skip($offset)->orderBy('id', "ASC")->get();
            $total = Medicine::count();
        }
        return View::make("medicine.selection", array(
            'medicines' => $products,
            'total' => $total,
            'max' => $max,
            'offset' => $offset,
            'searchText' => $searchText
        ));
    }

    public function getCreate() {
        $c = null;
        if(Input::get("id")) {
            $prescription = Prescription::find(intval(Input::get("id")));
        } else {
            $prescription = new Prescription();
        }
        $categories = Category::lists("name", "id");
        $companies = Medicine::groupBy()->lists("company");
        return View::make("prescription.create", array('prescription' => $prescription, 'companies' => $companies, 'categories' => $categories));
    }

    public function postSave() {
        $inputs = Input::all();
        $items = json_decode($inputs["items"]);
        $prescription = null;
        $inputs = Input::all();
        $user = Auth::user();
        if($user->userable_type != "Doctor") {
            return;
        }
        if($inputs["id"]) {
            $prescription = Prescription::find(intval($inputs["id"]));
        } else {
            $prescription = new Prescription();
        }
        $rules = array(
            'name' => 'required',
            'address' => 'required',
            'age' => 'required'
        );
        $validator = Validator::make($inputs, $rules);
        if($validator->fails()) {
            return array('status' => 'error', 'message' => $validator->messages()->all());
        }
        $prescription->patient_name = $inputs['name'];
        $prescription->patient_address = $inputs['address'];
        $prescription->patient_age = $inputs['age'];
        $prescription->doctor_id = $user->userable_id;
        DB::transaction(function() use ($prescription, $items){
            $prescription->save();
            $prescription->items->each(function($item){
                $item->delete();
            });
            foreach($items as $item) {
                $prescriptionItem = new PrescriptionItem();
                if(isset($item->id)) {
                    $medicine = Medicine::find($item->id);
                    $prescriptionItem->name = $medicine->name;
                    $prescriptionItem->medicine_id = $medicine->id;
                } else {
                    $prescriptionItem->name = $item->name;
                }
                $prescriptionItem->description = $item->description;
                $prescriptionItem->prescription_id = $prescription->id;
                $prescriptionItem->save();
            }
        });
        return array('status' => "success", 'message' => 'Prescription has been save successfully', 'id' => $prescription->id);
    }

    public function getPrint() {
        $prescription = Prescription::find(Input::get("id"));
        return View::make('prescription.prescription', array('prescription' => $prescription));
    }
}