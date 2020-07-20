<?
    // Tạo đối tượng mysqli
    $conn = new mysqli('localhost', 'root','', 'survey');

    if(!$conn)
    {
        die("Connection failed: " . mysqlli_connect_error());
    }
    
    if(isset($_POST["sql"]))
    {
        $sql = $_POST["sql"];        
        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        {
            while( $data = $result->fetch_assoc()) {  

                $myJSON = json_encode($data,true);
                echo $myJSON;  
            }        
       }
       else
       {
            echo "err";
       }
    }
    else
    {
        echo "err";
    }

    mysqli_close($conn);
?>