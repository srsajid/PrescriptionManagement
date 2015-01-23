<?php
Route::get("/", function(){
    $message = Session::get("flash_error") ?: Session::get("flash_success");
    return View::make("dr.login", array('message' => $message));
})->before("guest");
Route::post("login", "AdminController@login");
Route::get("logout", "AdminController@logout");
Route::get("/dashboard", "AdminController@admin")->before("auth");
Route::get("/account/change-pass", "AdminController@changePass")->before("auth");
Route::post("/account/save-pass", "AdminController@savePass")->before("auth");
Route::controller("/dr", "DoctorController");
Route::group(array('before' => "admin"), function() {
    Route::controller("categoryAdmin", "CategoryAdminController");
    Route::controller("medicineAdmin", "MedicineAdminController");
    Route::controller("doctorAdmin", "DoctorAdminController");
    Route::controller("user", "UserController");
});
Route::controller("prescription", "PrescriptionController");
Route::get("test", function() {
   return Form::getSelectOption("s", "d", 10);
});