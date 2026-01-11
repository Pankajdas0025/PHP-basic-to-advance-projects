<?php
$conn = new mysqli("localhost" , "root", "Pankaj", "php_basic_projects");
if(!$conn){ echo "Database Connection Failed!";}

$response = $conn->query("SELECT * FROM fake_data");

if($response )

    {
if($response->num_rows>0)
    {
        $table = "";
        while($row = $response->fetch_assoc())
            {

                $table .= "
                    <tr>
                        <td>{$row['ID']}</td>
                        <td>{$row['FIRST']} </td>
                        <td>{$row['LAST']}</td>
                    </tr>" ;

            }
    }
    }
echo $table;





?>