<?php

include 'api.php';

$apiObject = new API();
$data = $apiObject->outputData();
$result=json_decode($data );
$output = '';

if(count($result) > 0){
    foreach($result as $row){
        $output .= '
            <tr>
                <td>'.$row->Id.'</td>
                <td>'.$row->name.'</td>
                <td>'.$row->sex.'</td>
                <td>'.$row->skill.'</td>
                <td>'.$row->mail.'</td>
                <td>'.$row->address.'</td>
                <td></td>
            </tr>
        ';
    }
}else{
    $output .= '<tr><td>Not found!</td></tr>';
}
echo $output;
?>