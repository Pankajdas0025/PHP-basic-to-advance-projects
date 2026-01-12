    <?php
    $conn = new mysqli("localhost" , "root", "Pankaj", "php_basic_projects");
    $total_data = $conn->query("SELECT COUNT(*) AS total_data FROM fake_data")->fetch_assoc()['total_data'];
    $limit = 5 ;


    if(isset($_POST['page']))
    {
    $offset = $_POST['page'];
    }
    else
    {
    $offset = 0;
    }



    if(!$conn){ echo "Database Connection Failed!";}
    $response = $conn->query("SELECT * FROM fake_data LIMIT {$offset} , {$limit}");

    if($response)

    {
    if($response->num_rows>0)
    {
    $table = "";

    while($row = $response->fetch_assoc())
        {
            $offset=$row['ID'];
            $table .= "
                <tr>
                    <td class='border-1 w-[20%] pl-[10px]'>{$row['ID']}</td>
                    <td class='border-1 w-[40%] pl-[10px]'>{$row['FIRST']} </td>
                    <td class='border-1 w-[40%] pl-[10px]'>{$row['LAST']}</td>
                </tr>" ;

        }

        $table .= "<tr class='text-center justtify-center content-center'><td colspan='3' id='pagination'>";
        if($offset>=$total_data)
            {
            $table .="<a class='bg-red-400 px-[15px] m-[2.5px] style='pointer-events:block' >Finished!</a>";
            }
        else {
            $table .="<a href='#'  data-page='{$offset}' class='bg-green-400 px-[15px] m-[2.5px]'>Load More</a>";
            }
        $table  .= "</td></tr>";
        echo $table;

    }
    else
        {
               echo  '<table class="table-auto w-[100%] bg-red-400 text-left">
                            <tr class="bg-green-500 text-white">
                                <td colspan="3" class="border-1 w-[40%] pl-[10px]"> No Data Found! </td>
                            </tr>
                     </table>';

        }
    }
echo "";




    ?>