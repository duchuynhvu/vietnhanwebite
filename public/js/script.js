/**
 * Created by nathan on 18/02/2017.
 */
$('.publish-switch').change(function (e) {
    e.preventDefault();
    var value = $(this).val();
    var token = $('#token').val();
    var database = $('#database').val();
    $.ajax({
        type: "put",
        url: database + "/switch/" + value,
        data: {id: value, _token: token},
        success: function (respone) {
            console.log(respone);
        }
    });
});
$('.feature-switch').change(function (e) {
    e.preventDefault();
    var value = $(this).val();
    var token = $('#token').val();
    var database = $('#database').val();
    $.ajax({
        type: "put",
        url: database + "/feature/switch/" + value,
        data: {id: value, _token: token},
        success: function (respone) {
            var result = JSON.parse(respone);
            if (result['status'] == 'FAIL') {
                alert(result['message']);
                location.reload(true);
            } else {
                alert(result['message']);
            }
        }
    });
});
$('#delete-button').click(function (e) {
    e.preventDefault();
    var del = [];
    var token = $('#token').val();
    var database = $('#database').val();
    $.each($("input[name='del']:checked"), function () {
        del.push($(this).val());
    });
    if (del == "") {
        alert('Select row to delete');
    } else {
        $.ajax({
            type: "post",
            url: database + "/delete",
            data: {id: del, _token: token},
            success: function (respone) {
                console.log(respone);
                location.reload();
            }
        });
    }
});
$('.datepicker').datepicker();
var statusItems = [
    {code: "", status: "All"},
    {code: 1, status: "New"},
    {code: 0, status: "Read"}
];
$('#jsGrid').jsGrid({
    height: "auto",
    width: "100%",
    filtering: true,
    editing: false,
    sorting: true,
    paging: true,
    autoload: true,
    pageSize: 10,
    pageButtonCount: 5,
    selecting: true,
    controller: {
        loadData: function (filter) {
            return $.ajax({
                type: 'get',
                url: '/admin/contact-requests-jsGrid',
                data: filter
            });
        }
    },

    fields: [
        {
            itemTemplate: function (val, item) {
                return $("<input>").attr("type", "checkbox").attr("name", "del").val(item.id);
            },
            align: "center",
            width: "20"
        },
        {name: "name", title: "Name", type: "text"},
        {name: "email", title: "Email", type: "text", width: "200px"},
        {name: "status", title: "Status", type: "select", items: statusItems, valueField: "code", textField: "status"},
        {name: "created_at", title: "Created At", type: "text", filtering: false},
        {name: "updated_at", title: "Updated At", type: "text", filtering: false},
        {
            itemTemplate: function (val, item) {
                return $("<a>").addClass("btn btn-default").text("Detail").attr("href", "/admin/contact-requests/" + item.id);
            },
            align: "center"
        }
    ]

});