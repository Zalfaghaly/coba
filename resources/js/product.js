$(function () {
    $("#produtTB").DataTable({
        serverSide: true,
        processing: true,
        ajax: "/getprodut",
        columns: [
            { data: "id", name: "id", visible: false },
            { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
            { data: "kodeproduk", name: "kodeproduk" },
            { data: "namaproduk", name: "namaproduk" },
            { data: "harga", name: "harga" },
            { data: "stock", name: "stock" },
            { data: "deskripsi", name: "deskripsi" },
            { data: "menuadmin", name: "menuadmin", orderable: false, searchable: false },
        ],
        order: [[0, "desc"]],
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"],
        ],
    });
});
