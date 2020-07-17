<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tìm hiểu PHP</title>
</head>

<body>
    <p>
        <b>File demo: </b>Tìm hiểu về PHP
        <br />
        <b>Người thực hiện: </b> LieuND
    </p>
    <p>
        <?echo "I. Tìm hiểu các hàm kiểm tra dữ liệu";?>
    </p>
    <p>
        <?
            echo "1. Hàm isset():<br>";
            echo "- Trường hợp chưa khai báo biến \$a kết quả trả về là: ";

            echo (isset($a)) ? 'true' : 'false';

            echo "</br>";
            echo "- Trường hợp đã khai báo biến \$a và không khởi tạo giá trị, kết quả trả về là: ";
            
            $a;
            echo (isset($a)) ? 'true' : 'false';
                       
            echo "</br>";
            echo "- Trường hợp đã khai báo biến \$a và set giá trị cho biến là rỗng, kết quả trả về là: ";
            
            $a = '';
            echo (isset($a)) ? 'true' : 'false';
                       
            echo "</br>";
            echo "- Trường hợp đã khai báo biến \$a và set giá trị cho biến là null, kết quả trả về là: ";
            $a = null;
            echo (isset($a)) ? 'true' : 'false';
            
            echo "</br>";
            echo "- Trường hợp đã khai báo biến \$a và set giá trị cho biến là != rỗng, kết quả trả về là: ";
            
            $a = 'xin chao';
            echo (isset($a)) ? 'true' : 'false';
            
            echo "</br>";
            echo "=> Hàm isset() sẽ trả về kết quả true nếu 1 biến đã được khai báo và set giá trị cho biến đó bao gồm giá trị rỗng, và trả về kết quả false nếu biến đó chưa được khai báo hoặc đã được khai báo nhưng chưa được set giá trị cho biến đó hoặc set giá trị null.";
        ?>
    </p>

    <p>
        <?
            echo "2. Hàm empty(): </br>";

            echo "- Trường hợp chưa khai báo biến \$b kết quả trả về là: ";
            echo (empty($b)) ? 'true' : 'false';
            
            echo "</br>";
            echo "- Trường hợp đã khai báo biến \$b và không khởi tạo giá trị, kết quả trả về là: ";
            
            $b;
            echo (empty($b)) ? 'true' : 'false';
            
            echo "</br>";
            echo "- Trường hợp đã khai báo biến \$b và set giá trị rỗng cho biến, kết quả trả về là: ";
            
            $b = '';
            echo (empty($b)) ? 'true' : 'false';
            
            echo "</br>";
            echo "- Trường hợp đã khai báo biến \$b và set giá trị null cho biến, kết quả trả về là: ";
            
            $b = null;
            echo (empty($b)) ? 'true' : 'false';
            
            echo "</br>";
            echo "- Trường hợp đã khai báo biến \$b và set giá trị 0 cho biến, kết quả trả về là: ";
            
            $b = 0;
            echo (empty($b)) ? 'true' : 'false';
            
            echo "</br>";
            echo "- Trường hợp đã khai báo biến \$b và set giá trị != rỗng và != 0 cho biến, kết quả trả về là: ";
            
            $b = 5;
            echo (empty($b)) ? 'true' : 'false';
            
            echo "</br>";
            echo "=> Hàm emty() sẽ trả về kết quả true cho các biến chưa được khai báo hoặc mang giá trị rỗng hoặc null hoặc mang giá trị 0 và trả về kết quả là false nếu biến đó mang giá trị khác rỗng và khác 0.";
        ?>
    </p>

    <p>
        <?
        echo "3. Hàm is_array():</br>";
        echo "Dùng để kiểm tra 1 biến có phải là mảng hay không.</br>";
        $a = [1,2,3];
        echo "- Trường hợp biến \$a cần kiểm tra là mảng thì kết quả trả về là: ";
        
        echo (is_array($a)) ? 'true' : 'false';
        
        echo "</br>";
        $a = 1;
        echo "- Trường hợp biến \$a cần kiểm tra không phải là mảng thì kết quả trả về là: ";
        
        echo (is_array($a)) ? 'true' : 'false'; 
        ?>
    </p>

    <p>
        <?
        echo "4. Hàm is_string():</br>";
        echo "Dùng để kiểm tra 1 biến có phải là kiểu chuỗi hay không.</br>";
        $a = "xin chao";
        echo '- Trường hợp biến $a = "xin chao" thì kết quả trả về là: ';
        
        echo (is_array($a)) ? 'true' : 'false';
                
        echo "</br>";
        $a = 1;
        echo "- Trường hợp biến \$a = {$a} thì kết quả trả về là: ";
        
        echo (is_string($a)) ? 'true' : 'false';
        
        ?>
    </p>

    <p>
        <?
        echo "5. Hàm is_int():</br>";
        echo "Dùng để kiểm tra 1 biến có phải là kiểu số nguyên hay không.</br>";
        $a = 1;
        echo "- Trường hợp biến \$a = {$a} thì kết quả trả về là: ";
        
        echo (is_int($a)) ? 'true' : 'false';
        
        echo "</br>";
        $a = 1.2;
        echo "- Trường hợp biến \$a = {$a} thì kết quả trả về là: ";
        
        echo (is_int($a)) ? 'true' : 'false';
        
        ?>
    </p>

    <p>
        <?
        echo "6. Hàm is_float():</br>";
        echo "Dùng để kiểm tra 1 biến có phải là kiểu số thực (float) hay không.</br>";
        $a = 1.2;
        echo "- Trường hợp biến \$a = {$a} thì kết quả trả về là: ";
        
        echo (is_float($a)) ? 'true' : 'false';
        
        echo "</br>";
        $a = 1;
        echo "- Trường hợp biến \$a = {$a} thì kết quả trả về là: ";
        
        echo (is_float($a)) ? 'true' : 'false';
        ?>
    </p>

    <p>
        <?
        echo "7. Hàm is_double():</br>";
        echo "Dùng để kiểm tra 1 biến có phải là kiểu số thực (double) hay không.</br>";
        $a = 1.35;
        echo "- Trường hợp biến \$a = {$a} thì kết quả trả về là: ";
        
        echo (is_double($a)) ? 'true' : 'false';
        
        echo "</br>";
        $a = 1;
        echo "- Trường hợp biến \$a = {$a} thì kết quả trả về là: ";
        
        echo (is_double($a)) ? 'true' : 'false';   
        ?>
    </p>

    <p>
        <?
            echo "8. Hàm is_null():</br>";
            echo "Dùng để kiểm tra 1 biến có null hay không.</br>";
            $a = null;
            echo "- Trường hợp biến \$a là null thì kết quả trả về là: ";
            
            echo (is_null($a)) ? 'true' : 'false';
            
            echo "</br>";
            $a = 1;
            echo "- Trường hợp biến \$a = {$a} thì kết quả trả về là: ";
            
            echo (is_null($a)) ? 'true' : 'false';  
        ?>
    </p>

    <p>
        <?
            echo "9. Hàm in_array():</br>";
            echo "Dùng để kiểm tra giá trị của 1 biến có tồn tại trong 1 mảng hay không hay không.</br>";
            $a = 1;
            $b = [1,2,3];
            echo "- Trường hợp biến \$a = {$a} và mảng \$b = [1,2,3] thì kết quả trả về là: ";
            
            echo (in_array($a, $b)) ? 'true' : 'false';
           
            echo "</br>";
            $a = 5;
            $b = [1,2,3];
            echo "- Trường hợp biến \$a = {$a} và mảng \$b = [1,2,3] thì kết quả trả về là: ";
            
            echo (in_array($a, $b)) ? 'true' : 'false';
        ?>
    </p>

    <p>
        <?
            echo "10. Hàm array_key_exists():</br>";
            echo "Dùng để kiểm tra 1 key có tồn tại trong 1 mảng hay không hay không.</br>";
            $a = 'id';
            $b = ['id' => '123', 'name'=> 'Nguyen Van A'];
            echo "- Trường hợp biến \$a = {$a} và mảng \$b: [id:123, name: Nguyen Van A] thì kết quả trả về là: ";
            
            echo (array_key_exists($a, $b)) ? 'true' : 'false';
            
            echo "</br>";
            $a = 'address';
            $b = ['id' => '123', 'name'=> 'Nguyen Van A'];
            echo "- Trường hợp biến \$a = {$a} và mảng \$b: [id:123, name: Nguyen Van A] thì kết quả trả về là: ";
            
            echo (array_key_exists($a, $b)) ? 'true' : 'false';
        ?>
    </p>

    <p>
        <?
            echo "11. Phân biệt dấu =,==,===</br>";
            echo "- Dấu \"=\" dùng để set giá trị cho 1 biến</br>";
            $a = 6;
            echo "Sau khi thực hiện đoạn code \"\$a = 6;\" thì biến \$a sẽ có giá trị là {$a}";
        ?>

        <p>
            <?
                echo "- Dấu \"==\" là 1 toán tử so sánh tương đương giá trị của 2 biến bất kỳ</br>";
                $a = 1;
                $b = 1;
                echo "+ Trường hợp \$a =";
                var_dump($a);
                echo "và \$b =";
                var_dump($b);
                echo "thì kết quả trả về là: ";
                echo ($a == $b) ? 'true' : 'false';

                echo "</br>";
                $a = 1;
                $b = 2;
                echo "+ Trường hợp \$a =";
                var_dump($a);
                echo "và \$b =";
                var_dump($b);
                echo "thì kết quả trả về là: ";
                echo ($a == $b) ? 'true' : 'false';

                echo "</br>";
                $a = 1;
                $b = "1";
                echo "+ Trường hợp \$a =";
                var_dump($a);
                echo "và \$b =";
                var_dump($b);
                echo "thì kết quả trả về là: ";
                echo ($a == $b) ? 'true' : 'false';
            ?>
        </p>

        <p>
            <?
                echo "- Dấu \"===\" là 1 toán tử so sánh tương đồng giá trị của 2 biến bất kỳ</br>";
                $a = 1;
                $b = 1;
                echo "+ Trường hợp \$a =";
                var_dump($a);
                echo "và \$b =";
                var_dump($b);
                echo "thì kết quả trả về là: ";
                echo ($a === $b) ? 'true' : 'false';

                echo "</br>";
                $a = 1;
                $b = 2;
                echo "+ Trường hợp \$a =";
                var_dump($a);
                echo "và \$b =";
                var_dump($b);
                echo "thì kết quả trả về là: ";
                echo ($a === $b) ? 'true' : 'false';

                echo "</br>";
                $a = 1;
                $b = "1";
                echo "+ Trường hợp \$a =";
                var_dump($a);
                echo "và \$b =";
                var_dump($b);
                echo "thì kết quả trả về là: ";
                echo ($a === $b) ? 'true' : 'false';
            ?>
        </p>
    </p>
    <p>
        <?
            echo "II. Sử dụng const và define </br>";

            define("VARDEFINE", "Xin chao");
            const VARCONST = "Cac ban";

            echo "- Khai báo hằng bằng cách sử dụng hàm [define(\"VARDEFINE\", \"Xin chao\");]. Kết quả của biến hằng VARDEFINE là: ";
            var_dump(VARDEFINE);

            echo "</br>";
            echo "- Khai báo hằng bằng cú pháp [const VARCONST = \"Cac ban\";]. Kết quả của biến hằng VARDEFINE là: ";
            var_dump(VARCONST);
        ?>
    </p>

    <p>
        <?
            echo "III. Sử dụng regex cơ bản </br>";
            $a = 'xin chao';
            $pattern = '/xin/';
            echo "Sử dụng hàm preg_match() để kiểm tra \$pattern: {$pattern} có khớp trong chuỗi \$a: \"{$a}\" hay không, và kết quả là: ";
            echo preg_match($pattern, $a) ? "Khớp" : "Không khớp";

            echo "</br>";
            $a = 'xin chao';
            $pattern = '/ban/';
            echo "Sử dụng hàm preg_match() để kiểm tra \$pattern: {$pattern} có khớp trong chuỗi \$a: \"{$a}\" hay không, và kết quả là: ";
            echo preg_match($pattern, $a) ? "Khớp" : "Không khớp";
        ?>
    </p>

    <p>
        <?
            echo "IV. Làm việc với mảng</br>";
            echo "1. Tìm kiếm mảng</br>";

            $a = "123";
            $b = ['id' => '123', 'name'=> 'Nguyen Van A'];
            
            echo "sử dụng hàm array_search() để tìm kiếm \$a= {$a} trong mảng \$b: ";
            var_dump($b);
            echo "và kết quả trả về là: ";
            var_dump(array_search($a,$b));

            echo "</br>";
            $a = "456";
            
            echo "sử dụng hàm array_search() để tìm kiếm \$a= {$a} trong mảng \$b: ";
            var_dump($b);
            echo "và kết quả trả về là: ";
            var_dump(array_search($a,$b));

            echo "</br>";
            echo "2. lọc mảng</br>";
            $a = [1,2,3,4,5,6,7,8,9,10];
            function le($var)
            {
               return ($var & 1);
            }

            function chan($var)
            {
               return (!($var & 1));
            }
            echo "- Có mảng ";
            var_dump($a);
            echo " sử dụng hàm array_filter để lọc ra những số chẵn và những số lẻ:</br>";

            echo "+ Mảng chẵn là: ";
            var_dump(array_filter($a, "chan"));
            
            echo "</br>";
            echo "+ Mảng lẻ là: ";
            var_dump(array_filter($a, "le"));

            echo "</br>";
            echo "3. check length</br>";
            
            echo "Sử dụng hàm count() để lấy length của mảng ";
            var_dump($a);
            echo ". Và kết quả là: ". count($a); 
        ?>
    </p>

    <p>
        <?
            echo "V. làm việc với chuỗi </br>";
            $a = "xin chao";
            $b = " các bạn";

            echo "- Ta có chuỗi \"{$a}\":";
            echo "</br>";
            echo "+ Sử dụng hàm substr để cắt chuỗi và lấy ra chữ đầu tiên và kết quả là: ". substr($a,0,3);

            echo "</br>";
            echo "+ Nối thêm chuỗi \"{$b}\" vào chuỗi ở trên và kết quả là: ". $a.$b;
            
            echo "</br>";
            $b = explode(" ", $a);
            echo "+ Tách chuỗi trên thành mảng, và kết quả là: ";
            var_dump($b);

            echo "</br>";
            echo "+ Nối mảng trên lại thành chuỗi, và kết quả là: ";
            var_dump(implode($b));
        ?>
    </p>

    <p>
        <?
            echo "VI. Vòng lặp, điều kiện </br>";
            echo "1. Dùng vòng lặp for xuất ra màn hình 5 chữ A: </br>";
            for($i = 1; $i < 6; $i++)
            {
                echo "A";
            }
            echo "</br>";
            echo "2. Dùng vòng lặp while xuất ra màn hình 4 chữ B: </br>";

            $a = 1;
            while($a < 5)
            {
                echo "B";
                $a ++;
            }

            echo "</br>";
            echo "3. Dùng vòng lặp Do while xuất ra màn hình 3 chữ C: </br>";

            $a = 0;
            do{
                echo "C";
                $a ++;
            }
            while($a < 3);

            echo "</br>";
            echo "4. Điều kiện if else:";

            $a = 0;
            $b = 1;

            echo "</br>";
            echo "Ta có \$a = {$a} và \$b = {$b}, Sử dụng if else để so sánh 2 giá trị trên và kế quả là: ";
            if($a === $b)
            {
                echo "Bằng nhau";
            }
            else
            {           
                echo "Không bằng nhau";
            }

            $a = 1;
            $b = 1;

            echo "</br>";
            echo "Ta có \$a = {$a} và \$b = {$b}, Sử dụng if else để so sánh 2 giá trị trên và kế quả là: ";
            if($a === $b)
            {
                echo "Bằng nhau";
            }
            else
            {           
                echo "Không bằng nhau";
            }

        ?>
    </p>


    <p>
        <?
     echo "VII. Class: </br>";
            class CaiBan
            {
                private $hinhDang;
                private $soChan;
                private $chieuCao;

                public function __construct($hinhDang, $soChan, $chieuCao)
                {
                    $this->hinhDang = $hinhDang;
                    $this->soChan = $soChan;
                    $this->chieuCao = $chieuCao;
                }

                public function GetHinhDang()
                {
                    return $this->hinhDang;
                }
                
                public function GetSoChan()
                {
                    return $this->soChan;
                }

                public function GetChieuCao()
                {
                    return $this->chieuCao;
                }
            }
            $table = new CaiBan("tròn", 4 , "1.5m");
            echo "Cái bàn có hình: ". $table->GetHinhDang();

            echo "</br>";
            echo "Cái bàn có số chân là: ". $table->GetSoChan();

            echo "</br>";
            echo "Cái bàn có chiều cao là: ". $table->GetChieuCao();

            echo "</br>";
        ?>
    </p>

    <p>
        <?
            echo "VIII. Sử dụng require, require_once, include, include_once: </br>";

            // lệnh require
            require 'import.php';
            show_message();


            // lệnh require_once
            require_once 'import2.php';
            show_message2();

            // lệnh include
            include 'include_import.php';
            show_message3();


            // lệnh include_once
            include_once 'include_import2.php';
            show_message4();
    ?>
    </p>

</body>

</html>