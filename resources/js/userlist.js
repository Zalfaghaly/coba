$(function () {
    $("#listuser").DataTable({
        serverSide: true,
        processing: true,
        ajax: "/getusers",
        columns: [
            { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
            { data: "id", name: "id" },
            { data: "name", name: "name" },
            { data: "email", name: "email" },
            { data: "menuadmin3", name: "menuadmin3", orderable: false, searchable: false },
        ],
        order: [[0, "desc"]],
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"],
        ],
    });
});
