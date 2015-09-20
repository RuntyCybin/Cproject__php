function cargarTabla() {
    $('#example').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "model/post.php",
            "type": "POST"
        },
        "columns": [
            {"data": "Id"},
            {"data": "Nombre"},
            {"data": "Nick"},
            {"data": "edad"},
            {"data": "id_categoria"}
        ]
    });
}
