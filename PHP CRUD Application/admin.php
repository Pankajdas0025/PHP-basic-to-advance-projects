
<?php

if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search = $conn->real_escape_string($_GET['search']);
    $query = "SELECT * FROM posts WHERE user_id='$Blogger_id' AND (title LIKE '%$search%' OR content LIKE '%$search%'  OR created_at LIKE '%$search%')";
    $result = $conn->query($query);
     if ($result->num_rows > 0) {


        while ($row = $result->fetch_assoc())

        {
           echo "<tr>
                <td class='ttittle'>{$row['title']}</td>
                <td><textarea readonly>{$row['content']}</textarea></td>
                <td>{$row['created_at']}</td>

                 <td>
                    <button class='a1'><a href='view?id={$row['id']}' class='glyphicon glyphicon-eye-open'></a></button>
                    <button class='a2'><a href='update?id={$row['id']}' class='glyphicon glyphicon-edit'></a></button>
                    <button class='a3'><a href='delete?id={$row['id']}' onclick='return confirm(\"Are you sure?\")' class='glyphicon glyphicon-trash'></a></button>
                </td>
              </tr>";
            }

    } else
    {


      echo "<script>
            alert('No data found!');
            window.location.href = 'admin';
          </script>";

    }
}
?>