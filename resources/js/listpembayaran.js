$(function () {
    $("#listpembayaranTable").DataTable({
        serverSide: true,
        processing: true,
        ajax: "/getpembayaran",
        columns: [
            { data: "id", name: "id", visible: false },
            { data: "DT_RowIndex", name: "DT_RowIndex", orderable: false, searchable: false },
            { data: "nama_penerima", name: "nama_penerima" },
            { data: "alamat", name: "alamat" },
            { data: "no_hp", name: "no_hp" },
            { data: "jumlah", name: "jumlah" },
            { data: "biaya", name: "biaya" },
            { data: "metode.metod", name: "metode.metod" },
            { data: "statuse.proses", name: "statuse.proses" },
            { data: "product.kodeproduk", name: "product.kodeproduk" },
            { data: "user.name", name: "user.name" },
            { data: "menuadmin2", name: "menuadmin2", orderable: false, searchable: false },
        ],
        order: [[0, "desc"]],
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, "All"],
        ],
    });
});


