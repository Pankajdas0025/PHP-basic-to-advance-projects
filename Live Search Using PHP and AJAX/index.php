<!-- <!DOCTYPE html> -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Search using PHP and AJAX</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .pagination li a

        {
            padding: 5px 10px;
            background-color: skyblue;
            margin:1.5px 1px;
            text-decoration: none;
            color:white;
        }
          .pagination .active

        {

            background-color: green;

        }
    </style>
</head>
<body><div class="container bg-warning mx-auto w-50 mt-4 shadow bordered">
         <div class="row" >
             <div class="col-12 mw-100 my-5 p-3">
                <h2 class="text-dark">Live Search Using PHP and AJAX</h2>
                <input type="search" placeholder="Search Here..." id="search-bar" class="px-4 py-2">
             </div>
            <div class="col-12">
                  <table class="table table-bordered table-hover w-100" >
                    <thead class="table-dark">
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <tbody>
                    </thead>
                        <tbody id="table-data">
                          <!-- Dynamic data load Here ............ -->
                        </tbody>
                    </table>



                    </div>
                </div>
         </div>
         </div>
         <!-- Add jQuery CDN for AJAX  -->
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(
                function()
                {
                    function loadallData()
                    {
                        $.ajax({
                            url:"load-all-data.php",
                            method:"GET",
                            success:function(data)
                            {
                                $("#table-data").html(data);
                            }
                        });
                    }
                    loadallData();

                        $("#search-bar").on("keyup" , function()
                        {
                            let searchValue = $("#search-bar").val();
                            $.ajax({
                            url:"load-search-data.php",
                            method:"POST",
                            data:{'search':searchValue,},
                            success:function(data)
                            {
                                $("#table-data").html(data);
                            }
                        });

                        })


                }
            );
        </script>
</body>
</html>

