/**
 * Created by User on 4/25/14.
 */
$(function(){
    App.tabs.tabs = $("#tabs");
    App.global_event.trigger("tab-created");
    App.tabs.tabs.tabs({
        beforeLoad: function( event, ui ) {
            ui.jqXHR.error(function (xhr, status, resp) {
                ui.panel.loader(false);
                var html = "Couldn't load this tab. We'll try to fix this as soon as possible.";
                if(xhr.status == 401) {
                    html = "Couldn't load this tab. You do not have right permission. "
                }
                ui.panel.html(html);
            });
        }
    });
    $("#change-password-btn").on("click", function() {
        util.editPopup("Change Password", App.baseUrl + "account/change-pass", {});
    });

})