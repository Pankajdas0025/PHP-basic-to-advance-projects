<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Search using PHP and AJAX</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>
<body>

<div class="w-[100%] mx-auto p-[5px] bg-sky-500 shadow-[0px_0px_5px_black] font-sans sm:w-[50%]">
    <div class="bg-yellow-500 my-[5px] text-black-700 p-[10px] text-[2rem] font-bold-100">
      Load More Pagination Using PHP and AJAX
    </div>
    <div>

            <table class='table-auto w-[100%] bg-white text-left'>
            <thead id='table-head'>
                <tr class='bg-green-500 text-white'>
                    <th class='border-1 pl-[10px]'>ID</th>
                    <th class='border-1 pl-[10px]'>FIRST</th>
                    <th class='border-1 pl-[10px]'>LAST</th>
                </tr>
            </thead>
            <tbody id="table-data">

            </tbody>
            </table>

    </div>

</div>


         </div>
         <!-- Add jQuery CDN for AJAX  -->
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
            <script>
            $(document).ready(function () {

                // Load data ====================================================
                function loadallData(offset) {
                    $.ajax({
                        url: "load-all-data.php",
                        method: "POST",
                        data: { page: offset },
                        success: function (data) {
                            if(data)
                            {
                                $("#pagination").remove();

                                $("#table-data").append(data).slideDown();
                            }

                        }
                    });
                }

                // First load on page start
                loadallData();

                // Data Pagination ===============================================
                $(document).on("click", "#pagination a", function (e) {
                    e.preventDefault();
                    let offset_value = $(this).data("page");
                    if(offset_value)
                    {
                    loadallData(offset_value);
                    }

                });

            });
            </script>

</body>
</html>

