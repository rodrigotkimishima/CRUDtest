<?php 
    //Funcao para se conectar ao banco de dados
    function connect_database($ip,$user,$password,$database){
    $db = mysqli_connect('localhost', 'root', '', 'crud');
    return $db;
}

    //Funcao SELECT do banco de dados
    function _database($db, $select, $from, $where = null)
    {
        
    }

?>