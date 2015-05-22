/**
 * Created by User on 8/4/14.
 */
var _p = App.tabs.prescription = new TableTab("prescription");

_p.afterTableLoad = function(event, ui) {
    var _self = this;
    var panel = ui.panel;
    panel.find(".create-prescription").on("click", function() {
        _self.create();
    })
}

_p.onMenuOptionClick = function(action, data) {
    var _self = this;
    switch (action) {
        case "edit":
            _self.create(data.id);
            break;
        case "Print":
            _self.print(data.id);
            break;
    }
};
_p.create = function(id) {
    var _self = this;
    util.editPopup("Create Prescription", App.baseUrl + "prescription/create", {
        width: $(window).width() - 200,
        data: {id: id},
        after_load: function () {
            var x = 0;
            var _self = this
            var selector = util.twoSideSelection(this, App.baseUrl + "prescription/selection", "items");
            selector.afterSelect = function(row) {
                var nameTd = row.find(".name");
                var name = nameTd.text();
                nameTd.text("")
                var template = '<div class="medicine">' + name + '</div>' +
                    '<div class="description"><input type="text" name="description" class="form-control"></div>'
                nameTd.html($(template))

            }
            var customMedicinePanel = this.find(".custom-medicine");
            customMedicinePanel.find("button").on("click", function() {
                var name = customMedicinePanel.find("input").val();
                if(name) {
                    var tr = $('<tr><td class="name"><div class="medicine">'+ name + '</div><div class="description"><input type="text" name="description" class="form-control"></div></td>' +
                    '<td class="action"><span class="glyphicon glyphicon-remove"></span></td></tr>');
                    _self.find(".right-table").append(tr)
                    customMedicinePanel.find("input").val("")
                    tr.find(".glyphicon-remove").on("click", function() {
                        tr.remove();
                    })
                }
            });
            var filterBlock = this.find(".filter-block")
             filterBlock.find("button").on("click", function() {
                selector.loadLeftTable();
            })
            var _super = selector.beforeLoadLeftTable;
            selector.beforeLoadLeftTable = function(params) {
                params.category = filterBlock.find("[name=category]").val();
                params.company = filterBlock.find("[name=company]").val();
                params.ingredient = filterBlock.find("[name=ingredient]").val();
                _super.call(this, params)
            }

        },
        preSubmit: function(ajaxSetting) {
            var popup = this;
            var items = [];
            var form = this.find("form");
            var rightTable = form.find(".last-column table");
            rightTable.find("tr").not(":eq(0)").each(function(){
                var it = $(this);
                var item = {};
                item.id = it.find("input[name=items]").val();
                item.description = it.find("input[name=description]").val();
                if(!item.id) {
                    item.name = it.find(".medicine").text();
                }
                items.push(item);
            })
            form.loader();
            util.ajax({
                url: App.baseUrl + "prescription/save",
                type: "POST",
                dataType: "json",
                data: {
                    id: form.find("input[name=id]").val(),
                    name: form.find("input[name=name]").val(),
                    address: form.find("input[name=address]").val(),
                    age: form.find("input[name=age]").val(),
                    items: JSON.stringify(items)
                },
                complete: function() {
                    form.loader(false)
                },
                success: function(resp) {
                    util.notify(resp.message, resp.status);
                    popup.dialog("close");
                    if(resp.id) {
                        _self.print(resp.id)
                    }
                    _self.reload();
                },
                error: function(a, b, resp) {
                    util.notify(resp.message, "error")
                }
            })
            return false;
        }
    });
}

_p.print = function (id){
    var form = '<form action="' + App.baseUrl + 'prescription/print" target="_blank">' +
        '<input type="hidden" name="id" value="'+id+'">'+
        '</form>'
    $(form).submit();
}