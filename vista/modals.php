<?php
echo '      '
 . '<div class="modal fade" id="newUs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">'
 . ' <div class="modal-dialog" role="document">'
 . '  <div class="modal-content" style="height: 400px;">'
 . '   <div class="modal-header">'
 . '     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
 . '     <h4 class="modal-title" id="myModalLabel">Nuevo usuario</h4>'
 . '   </div>'
 . '   <div class="modal-body">'
 . '     <form id="nuevoUser" action="#">'
 . '         <div class="form-group">'
 . '             <label for="nombre">Nombre</label>'
 . '             <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre usuario">'
 . '         </div>'
 . ''
 . '         <div class="form-group">'
 . '             <label for="nombre">Apodo usuario</label>'
 . '             <input type="text" class="form-control" name="nickname" id="apodo" placeholder="Apodo usuario">'
 . '         </div>'
 . ''
 . '         <div class="form-group">'
 . '             <label for="nombre">Edad usuario</label>'
 . '             <input type="number" class="form-control" name="edad" id="edad" placeholder="Edad usuario">'
 . '         </div>'
 . ''
 . '         <div class="form-group">'
 . '             <label for="nombre">Categoria usuario</label>'
 . '             <select class="form-control" name="id_categoria">';
include '/controller/createConnection.php';
$conexion = new createConnection();
$conexion->connectToDatabase();
$sql_get_categ = "SELECT id, name FROM categoria";
$conexion->_select_query($sql_get_categ);
for ($i = 0; $i < $conexion->num_registros; $i++) {
    echo '<option value="' . $conexion->result[$i]["id"] . '">' . $conexion->result[$i]["name"] . '</option>';
}
echo '          </select>'
 . '         </div>'
 . '         <div class="form-group">'
 . '             <button id="sendNewUser" class="button button--winona button--border-thin button--round-s" data-text="Crear" style="margin-top: 0px;"><span>Crear</span></button>'
 . '         </div>'
 . '     </form>'
 . '   </div>'
 . '  </div>'
 . ' </div>'
 . '</div>';

/*
  include '/controller/modal.php';
  $id = "edita_user";
  $h = '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
  $h .= '<h4 class="modal-title" id="myModalLabel">Editar usuario</h4>';
  $b = '<p>cuerpo del editor de usuario</p>';
  $f = '<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>';
  $f .= '<button type="button" class="btn btn-primary">Guardar cambios</button>';
  $modal = new modal($id, $h, $b, $f);
 */
?>
<div class="modal fade bs-example-modal-lg" id="editUs" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Editar usuario</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="edit_usuario">
                        <div class="container" style="float: left;">
                            <div class="form-group">
                                <label for="Nombre">Nombre:</label>
                                <input type="text" placeholder="nombre" name="nombre" id="nombre">
                            </div>
                            <div class="form-group">
                                <label for="apodo">Nick:</label>
                                <input type="text" placeholder="apodo" name="apodo" id="apodo">
                            </div>
                            <div class="form-group">
                                <label for="edad">Edad:</label>
                                <input type="number" placeholder="edad" name="edad" id="edad">
                            </div>
                            <div class="form-group">
                                <label for="id_categoria">Categoria:</label>
                                <input type="number" placeholder="categoria" name="id_categ" id="id_categ">
                            </div>
                            <button type="submit">Modificar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerar</button>
            </div>
        </div>
    </div>
</div>