/**
 * Created by User on 8/4/14.
 */
var _m = App.tabs.medicine = new TableTab("medicine");

_m.afterTableLoad = function(event, ui) {
    var _self = this;
    var panel = ui.panel;
    panel.find(".create-medicine").on("click", function(){
        _self.createEditMedicine();
    });
}

_m.createEditMedicine = function(id) {
    var _self = this;
    var title = id ? "Edit Medicine" : "Create Medicine";
    util.editPopup(title, App.baseUrl+ "medicineAdmin/create", {
        data: {id: id},
        success: function() {
            _self.reload();
        }
    });
}

_m.onMenuOptionClick = function(action, data) {
    var _self = this;
    switch (action) {
        case "edit":
            _self.createEditMedicine(data.id);
            break;
    }
}
