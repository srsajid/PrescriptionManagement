/**
 * Created by User on 8/4/14.
 */
var _o = App.tabs.doctor = new TableTab("doctor");
_o.onMenuOptionClick = function(action, data) {
    var _self = this;
    switch (action) {
        case "approve":
            _self.approve(data.id);
            break;
        case "disapprove":
            _self.disapprove(data.id);
    }
}

_o.approve = function(id) {
    var _self = this
    util.ajax({
        url: App.baseUrl + "doctorAdmin/approve",
        data: {id: id},
        success: function() {
            _self.reload();
        }
    })
}
_o.disapprove = function(id) {
    var _self = this
    util.ajax({
        url: App.baseUrl + "doctorAdmin/disapprove",
        data: {id: id},
        success: function() {
            _self.reload();
        }
    })
}