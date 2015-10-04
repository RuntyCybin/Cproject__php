<?php
$ajax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if ($ajax) {
    include '../controller/createConnection.php';
    
    $connection = new createConnection();
    $conexion = $connection->connectToDatabase();
    
    //$con = $connection ->selectDatabase($conexion); //creamos la conexion
}
if (isset($_POST["campos"])) {
    $vars = explode("&", $_POST["campos"]);
    $names = array();
    $values = array();
    for($i = 0; $i < COUNT($vars); $i++){
        $campo = $vars[$i];
        $valores_campo = explode("=",$campo);
        array_push($names, $valores_campo[0]);
        array_push($values, $valores_campo[1]);        
    }
    
    $connection->valores_add = $values;  
    $connection->rows = $names;
    $table = "users";
    echo "valores: ";var_dump($connection->valores_add);
    echo "rows: ";var_dump($connection->rows);
    
    $sql_get_campos = "SHOW COLUMNS FROM cproject_db.users";
    //echo "campo rows: ";var_dump($connection->rows);
    $added = $connection->_insert_query($table);
}

if ($ajax) {
    echo json_encode(array(
        'aniadido' => $added
    ));
    exit();
} else {
    echo $html;
}
?>