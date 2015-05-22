/**
 * Created by User on 12/5/2014.
 */
window.app = {baseUrl: "/"}
$(function() {
    function renderModal(url, callback) {
        $.ajax({
            url: url,
            success: function(resp) {
                var modal = $(resp);
                $("body").append(modal);
                modal.modal('show');
                callback(modal);

            }
        })
    }
    $(".create-offer").on("click", function() {
        renderModal(app.baseUrl + "offer/create", function(modal) {
            modal.find("form").form({
                ajax: true,
                preSubmit: function(ajaxSetting) {
                    $.extend(ajaxSetting, {
                        success: function(resp) {
                            if(resp.status == "success") {
                                alertify.success(resp.message);
                                modal.modal("hide");
                                setTimeout(function() {
                                    modal.remove();
                                }, 1000)

                            } else {
                                alertify.error(resp.message);
                            }

                        },
                        error: function() {
                            alertify.error("Unexpected error occurred")
                        },
                        dataType: "json"
                    });
                }
            })
        })
    });

    $(".thumb.offer").on("click", function() {
       var $this = $(this)
       var offerId =  $this.attr("offer-id");
       renderModal(app.baseUrl + "offer/details/" + offerId, function(modal) {
            modal.find(".close-btn").on("click", function() {
                setTimeout(function(){
                    modal.remove();
                }, 1000)
            })
       })
    });
    $(".search-form").form({
        preSubmit: function() {
            var text = this.find("[name=searchText]").val();
            if(text) {
                window.location = window.location.origin + app.baseUrl + "search/"+ encodeURIComponent(text);
            }
            return false
        }
    });
    $(".subscription-form").form({
        ajax: true,
        preSubmit: function(ajaxSettings) {
            var form = this
            $.extend(ajaxSettings, {
                success:  function(resp) {
                    var dom = $('<p class="help-block '+ resp.status + '">' + resp.message + '</p>');
                    form.append(dom);
                    setTimeout(function() {
                        dom.remove();
                    }, 10000);
                }
            })
        }
    });
});