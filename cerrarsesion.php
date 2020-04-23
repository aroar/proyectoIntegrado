<?php
session_start();
session_destroy();
echo "se ha cerrado su sesión";
header('Refresh: 1 , url=index.php');

?>