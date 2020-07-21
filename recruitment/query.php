<?php
    // Tạo đối tượng mysqli
    // $conn = new mysqli('localhost', 'root','', 'recruitment');

    // if(!$conn)
    // {
    //     // die("Connection failed: " . mysqlli_connect_error());
    // }
    require "./config/config.php";
    if(isset($_POST["sql"]) && isset($_POST["query"]))
    {
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $sql = "SELECT COUNT(*) as result FROM usertbl where email='" + $email + "' and password='" + $password + "' and del_flag=0";
        // $sql = $_POST["sql"];
        $result = $conn->query($sql); 
        $query = $_POST["query"];
        $myJSON = array();
        if($query == "SELECT")
        {
            if ($result->num_rows > 0) 
            {
                while( $data = $result->fetch_assoc()) 
                {
                    // $myJSON = json_encode($data,true);
                    $myJSON[count($myJSON)] = $data;
                }  

                // header('Content-Type: application/json');      
                echo json_encode($myJSON);  
                echo"Hello";
                
            ;
            }
            else
            {
                    echo "err1";
            }
        }
    }
    else
    {
        echo "err2";
    }

    mysqli_close($conn);
?>
