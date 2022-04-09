<?php

//print name file
echo $_FILES['filename']['name'];

//move file to a designated location
//move_uploaded_file($_FILES['filename']['tmp_name'], $uploadPath);
?>