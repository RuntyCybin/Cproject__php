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

$elements = array();
//print_r($connection->result);
$cnt = 0;
for($i = 0; $i < $connection->num_registros; $i++){
    
    $id = $connection->result[$i]['id'];
    $nombre = $connection->result[$i]['nombre'];
    $nickname = $connection->result[$i]['nickname'];
    $edad = $connection->result[$i]['edad'];
    $categoria = $connection->result[$i]['id_categoria'];
    
    $aux = array(
                'Id' => '"'.$id.'"',
                'Nombre' => '"'.$nombre.'"',
                'Nick' => '"'.$nickname.'"',
                'edad' => '"'.$edad.'"',
                'id_categoria' => '"'.$categoria.'"'
            );
    array_push($elements, $aux);
    unset($aux);
    //var_dump($elements);
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
        'aaData' => $elements,
        'draw' => 1,
        'recordsTotal' => $cnt,
        'recordsFiltered' => $cnt
    ));
    exit();
} else {
    echo $html;
}
?>