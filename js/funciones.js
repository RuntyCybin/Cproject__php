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

function nuevoUsuario() {
    $('#sendNewUser').click(function () {
        console.log("lelga");

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
