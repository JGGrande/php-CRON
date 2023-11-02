<?php 

use Unialfa\DatabaseConnection;

require_once 'vendor/autoload.php';

$host = "mysqlunialfa";
$port = "3307";
$username = "root";
$password = "root";
$dbname = "pedidos";

$db = new DatabaseConnection($host, $port, $username, $password, $dbname);

$query = "SELECT * FROM pedido WHERE movimentacao = 0";

$result = $db->query($query);

$pedidos = $result->fetchAll(PDO::FETCH_OBJ);

foreach($pedidos as $pedido){
    $sql = "UPDATE pedido SET movimentacao = 1 WHERE id = $pedido->id; ";
    $db->query($sql);


    file_put_contents(
        'log.log',
        print_r([
            "idPedido" => $pedido->id,
            "mensagem" => "atualizado com sucesso"
        ], true),
        FILE_APPEND
    );

}


$db->closeConnection();