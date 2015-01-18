<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 17/Jan/2015
 * Time: 1:00 PM
 */

class DoctorController extends BaseController {

    public function getRegister() {
        return View::make("dr.registration");
    }

    public function postRegister() {
        $rules = array(
            "name" => "required",
            "email" => "required|email",
            'username' => "required|unique:users",
            "password" => "required|min:8",
            "confirm_password" => "required|same:password",
            "address" => "required",
            "education" => "required",

        );
        $inputs = Input::all();
        $validator = Validator::make($inputs, $rules);
        if($validator->fails()) {
            return Redirect::to("dr/register")->withErrors($validator)->withInput($inputs);
        }

        $doctor = new Doctor();
        $doctor->name = $inputs["name"];
        $doctor->email = $inputs["email"];
        $doctor->phone = $inputs["phone"];
        $doctor->address = $inputs["address"];
        $doctor->education = $inputs["education"];

        $user = new User();
        $user->username = $inputs["username"];
        $user->password = Hash::make($inputs["password"]);
        $user->is_active = false;
        $user->userable_type = "Doctor";

        DB::transaction(function() use ($doctor, $user) {
            $doctor->save();
            $user->userable_id = $doctor->id;
            $user->save();
        });
        return Redirect::to("/")->with('flash_success', 'Registration request has been successfully sent');
    }

}