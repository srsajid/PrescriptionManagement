/**
 * Created by User on 8/4/14.
 */
var _p = App.tabs.prescription = new TableTab("prescription");

_p.afterTableLoad = function(event, ui) {
    var _self = this;
    var panel = ui.panel;
    panel.find(".create-category").on("click", function(){
        _self.createEditCategory();
    });
}

_p.createEditCategory = function(id) {
    var _self = this;
    var title = id ? "Edit Category" : "Create Category";
    util.editPopup(title, App.baseUrl+ "categoryAdmin/create", {
        data: {id: id},
        success: function() {
            _self.reload();
        }
    });
}

_p.onMenuOptionClick = function(action, data) {
    var _self = this;
    switch (action) {
        case "edit":
            _self.createEditCategory(data.id);
            break;
    }
}
