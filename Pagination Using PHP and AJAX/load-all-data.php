    <?php
    $conn = new mysqli("localhost" , "root", "Pankaj", "php_basic_projects");
    $total_data = $conn->query("SELECT COUNT(*) AS total_data FROM fake_data")->fetch_assoc()['total_data'];
    $limit = 5 ;
    $total_page = ceil($total_data/$limit);

    if(isset($_POST['page']))
    {
    $page = $_POST['page'];
    }
    else
    {
    $page = 1 ;
    }
    $offset = ($page-1)*$limit;


    if(!$conn){ echo "Database Connection Failed!";}
    $response = $conn->query("SELECT * FROM fake_data LIMIT {$offset} , {$limit}");

    if($response )

    {
    if($response->num_rows>0)
    {
    $table = "";

            $table .= "
            <table class='table-auto w-[100%] bg-red-400 text-left'>
                <tr class='bg-green-500 text-white'>
                    <th class='border-1 pl-[10px]'>ID</th>
                    <th class='border-1 pl-[10px]'>FIRST</th>
                    <th class='border-1 pl-[10px]'>LAST</th>
                </tr>" ;

    while($row = $response->fetch_assoc())
        {

            $table .= "
                <tr>
                    <td class='border-1 w-[20%] pl-[10px]'>{$row['ID']}</td>
                    <td class='border-1 w-[40%] pl-[10px]'>{$row['FIRST']} </td>
                    <td class='border-1 w-[40%] pl-[10px]'>{$row['LAST']}</td>
                </tr>" ;

        }
        $table .= "</table>";
        $table .= "<div id='pagination' class='text-center justtify-center content-center h-[40px] block'>";
            for($i=1; $i<=$total_page; $i++)
                {
                            if($i==$page)
                                {
                                    $table .="<a href='#'  data-page='{$i}' class='bg-green-400 px-[15px] m-[2.5px]'>{$i}</a>";
                                }
                            else $table .="<a href='#'  data-page='{$i}' class='bg-blue-400 px-[15px] m-[2.5px]'>{$i}</a>";
                }


        $table  .= "</div>";
    }
    }
    echo $table;





    ?>