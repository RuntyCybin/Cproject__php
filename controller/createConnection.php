<?php

class createConnection {
    var $host = "localhost";
    var $username = "root";    // specify the sever details for mysql
    var $password = "";
    var $database = "cproject_db";
    var $num_registros;
    var $result;
    var $myconn;
    var $valores_add;
    var $rows;

    public function connectToDatabase(){ // create a function for connect database
        $conn = mysqli_connect($this->host, $this->username, $this->password, $this->database); // por objetos
        if (mysqli_connect_errno() && !$conn) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        } else {
            $this->myconn = $conn;
            return $conn;
            //$this->selectDatabase($conn);
        }
    }
    
    public function selectDatabase($conn) { // selecting the database.
        mysqli_select_db($conn, $this->database);  //use php inbuild functions for select database

        if (mysql_error()) { // if error occured display the error message
            echo "Cannot find the database " . $this->database;
            return false;
            
        } else {
            $this->myconn = $conn;
            
            echo "Connection established";
        }
    }
    
    private function tableExists($table) {
        $exists = false;
        //$sql_table_in_db = "SHOW TABLES FROM '" . $this->database . "' LIKE '" . $table . "'";
        $sql_table_in_db = "SELECT * FROM information_schema.`TABLES` WHERE TABLE_SCHEMA LIKE '".$this->database."' AND TABLE_NAME LIKE '".$table."'";
        
        $rs_table_in_db = mysqli_query($this->myconn, $sql_table_in_db);
        
        if ($rs_table_in_db) {
            
            $lines_table_in_db = mysqli_num_rows($rs_table_in_db);
            if ($lines_table_in_db >= 1) {
                $exists = true;
            } else {
                $exists = false;
            }
        }
        return $exists;
    }

    public function closeConnection() { // close the connection
        mysql_close($this->myconn);

        echo "Connection closed";
    }

    public function _select_query($sql) {
        $rs_sql = mysqli_query($this->myconn,$sql);
        if ($rs_sql) {
            $this->num_registros = mysqli_num_rows($rs_sql);
            
            $aux_array = array();
            //recorremos los registros recogidos de la consulta
            for ($j = 0; $j < $this->num_registros; $j++) {
                $lineas = mysqli_fetch_array($rs_sql); //leemos el registro
                $key = array_keys($lineas); //dividimos la fila por columnas
                //recorremos las columnas
                for ($i = 0; $i < COUNT($key); $i++) {
                    //si obtenemos mas de una linea de la select, dividimos el resultado por numeros
                    if ($this->num_registros > 1) {
                        $this->result[$j][$key[$i]] = $lineas[$key[$i]];
                    } else if ($this->num_registros < 1) {
                        $this->result = NULL;
                    } else {
                        //si solo tenemos una linea, mostramos un array simple
                        $this->result[$key[$i]] = $lineas[$key[$i]];
                    }
                }
            }
            //return $aux_array;
        } else {
            echo "ERROR en la consulta!";
        }
    }

    public function _insert_query($table) {
        
        $added = false;
        
        //si la tabla existe en la base de datos
        if ($this->tableExists($table)) {
            $sql_insert = "INSERT INTO " . $table . "";
            
            if ($this->rows != null) {
                $vars = implode(",", $this->rows);
                $sql_insert .= "(" . $vars . ")";
            }

            $sql_insert .= " VALUES ";
            
            //recorremos los nombres de las columnas
            for ($i = 0; $i < COUNT($this->rows); $i++) {
                if (is_string($this->valores_add[$i]))
                    $this->valores_add[$i] = "'" . $this->valores_add[$i] . "'"; //si el iesimo valor es de tipo string, lo colocamos entre comillas
            }

            $this->valores_add = implode(",", $this->valores_add); //convertimos el array de valores en un string separado por comas

            $sql_insert .= "(" . $this->valores_add . ")";
            
            $rs_insert = mysqli_query($this->myconn,$sql_insert);

            if ($rs_insert) {
                $added = true;
            }

            return $added;
        }
    }

}
