 <?
        function OpenConn ()
        {
            // Tạo đối tượng mysqli
            $conn = new mysqli('localhost', 'root','', 'survey');
            
            // Kiểm tra kết nối thành công hay thất bại
            // nếu thất bại thì thông báo lỗi
            if ($conn->connect_error) {
            return 0;
            } 
            
            // Thông báo kết nối thành công
            return $conn;
        }

        function CloseConn($conn)
        {
            mysqli_close($conn);
        }

        function Quyery ($query, $category)
        {
            if(!empty($query) && !empty($category))
            {
                $conn = OpenConn();
                if(!empty($conn))
                {
                    $data = [];
                    $result = $conn->query($query);
                    if($category == 'checkExist')
                    { 
                       if ($result->num_rows > 0) {
                        $data =  $result->fetch_assoc();
                       }
                        CloseConn($conn);
                        return $data['result'];
                    }
                    if($category == 'select')
                    {
                        if ($result->num_rows > 0) {
                        $data =  $result->fetch_assoc();
                        }
                        CloseConn($conn);
                        return $data;
                    }
                    if($category == 'insert')
                    {
                        CloseConn($conn);
                        return $result ;
                    }
                }
                else
                {
                    echo "<script type='text/javascript'>alert('Mất kết nối');</script>";
                    return 0;
                }
            }
        }
    ?>