function cargarTablaUsuarios() {
    // Edit record
    /*$('.editor_edit').click(function () {
        console.log("GET!");
        $('#editUs').modal({
            keyboard: true,
            show: true
        });
    });*/

    //debugger; //paraliza el javascript en este punto

    $('#example').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "./model/post.php",
            "type": "POST"
        },
        "columns": [
            {"data": "Id"},
            {"data": "Nombre"},
            {"data": "Nick"},
            {"data": "edad"},
            {"data": "id_categoria"},
            {
                data: null,
                className: "center",
                defaultContent: '<a data-target="#editUs" data-toggle="modal" id="editUser" class="editor_edit">Edit</a> / <a href="" class="editor_remove">Delete</a>'
            }
        ]
    });

}

function nuevoUsuario() {
    $('#sendNewUser').click(function () {
        //console.log("lelga");

        var str = $("#nuevoUser").serialize();

        console.log("serialized: " + str);
        //debugger; //paraliza el javascript en este punto

        $.ajax({
            method: "POST",
            url: "./model/post_form.php",
            data: {campos: str},
            dataType: 'json',
            async: false,
            success: function (data, textStatus, XMLHttpRequest)
            {
                alert("Creado con exito!");
            }
        })

    })

}
