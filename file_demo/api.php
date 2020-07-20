<?php
class API{
    function __construct(){
        $this->dbConnection();
    }

    function dbConnection(){
        $this->connect = new PDO("mysql:host=localhost;dbname=thuchanh", "root", "");
    }

    function outputData(){
        $select = $this->connect->prepare("SELECT * FROM employee ORDER BY id");
        if($select->execute()){
            while($row = $select->fetch(PDO::FETCH_ASSOC)){
                $data[] = $row;
            }
            return json_encode($data);
        }
    }

    function addNewToDo(){
        if(isset($_POST["save"])){
            $data = array(
                ':name' => $_POST["name"],
                ':sex' => $_POST["sex"],
                ':bday' => $_POST["bday"],
                ':skill' => $_POST["skill"],
                ':mail' => $_POST["mail"],
                ':address' => $_POST["address"]
            );
            $insert = $this->connect->prepare("INSERT INTO employee (name, sex,bDay,skill,mail,address) VALUES (:name, :sex,:bday,:skill,:mail,:address)");
            $insert->execute($data);
        }
    }

}

?>