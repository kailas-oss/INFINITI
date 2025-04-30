<?php
class Database {
    public $connect;
    public function __construct(){
        $dsn = "mysql:host=localhost;dbname=moviebooking";
        try {
            $this->connect = new PDO($dsn, 'root', '');
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "not connected".$e->getMessage();
        }
    }

    public function select(){
        $select = $this->connect->query("select * from movie;");
        $output["datas"] = $select->fetchAll(PDO::FETCH_ASSOC);
        print_r($output["datas"]);
    }
}

$obj = new Database();
$obj->select();
?>
