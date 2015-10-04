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
        for($i = 0; $i < $conexion->num_registros; $i++){
            echo '<option value="'.$conexion->result[$i]["id"].'">'.$conexion->result[$i]["name"].'</option>';
        }
        echo '          </select>'
        . '         </div>'
        . '         <div class="form-group">'
        . '             <button id="sendNewUser" class="button button--winona button--border-thin button--round-s" data-text="Crear" style="margin-top: 0px;"><span>Crear</span></button>'
        . '         </div>'
        . ''
        . '     </form>'
        . '   </div>'
        . '  </div>'
        . ' </div>'
        . '</div>';