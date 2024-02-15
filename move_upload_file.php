<?php
$thumbnail = rand(1, 10000) . '-' . $_FILES['thumbnail']['name'];
move_uploaded_file($_FILES['thumbnail']['tmp_name'], 'image/' . $thumbnail);
echo $thumbnail;