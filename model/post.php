<?php
$ajax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if ($ajax) {
    include '../controller/createConnection.php';
    
    $connection = new createConnection();
    $conexion = $connection->connectToDatabase();
    
    //$con = $connection ->selectDatabase($conexion); //creamos la conexion
}



$sql_get_users = "SELECT id, nombre, nickname, edad, id_categoria FROM users";
$consulta_users = $connection ->_select_query($sql_get_users);
var_dump($consulta_users);
foreach($consulta_users as $key => $val){
    
    $id = $consulta_users[$key]['id'];
    $nombre = $consulta_users[$key]['nombre'];
    $nickname = $consulta_users[$key]['nickname'];
    $edad = $consulta_users[$key]['edad'];
    $categoria = $consulta_users[$key]['id_categoria'];
    $aux = array(
                'Id' => '"'.$id.'"',
                'Nombre' => '"'.$nombre.'"',
                'Nick' => '"'.$nickname.'"',
                'edad' => '"'.$edad.'"',
                'id_categoria' => '"'.$categoria.'"'
            );
    array_push($elements, $aux);
    $cnt += 1;
}

/*
$rs_get_users = mysqli_query($conexion, $sql_get_users);
if($rs_get_users){
    $num_lineas = mysql_num_rows($rs_get_users);
    $elements = array();
    if($num_lineas > 0){
        $cnt = 0;
        while($linea = mysql_fetch_assoc($rs_get_users)){
            $id = $linea["id"];
            $nombre = $linea["nombre"];
            $nickname = $linea["nickname"];
            $edad = $linea["edad"];
            $categoria = $linea["categoria"];
            
            $aux = array(
                'Id' => '"'.$id.'"',
                'Nombre' => '"'.$nombre.'"',
                'Nick' => '"'.$nickname.'"',
                'edad' => '"'.$edad.'"',
                'categoria' => '"'.$categoria.'"'
            );
            array_push($elements, $aux);
            $cnt += 1;
        }
    }    
}*/

if ($ajax) {
    echo json_encode(array(
        'elements' => $elements,
        'draw' => 1,
        'recordsTotal' => $cnt,
        'recordsFiltered' => $cnt
    ));
    exit();
} else {
    echo $html;
}
?>