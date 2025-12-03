

<?php

$Pattern="ABCHIJKLMNOP01234QRSTvwxyzUVWXYZabcd*()efghijklmnopqrstu56789!@#$%^&<>~/\,?";
$Length=strlen($Pattern);
$Password="";
for($i=0;$i<8;$i++)

{
   
    $index=rand(0,$Length);
    $Password.=$Pattern[$index];

    
}
echo $Password;

?>