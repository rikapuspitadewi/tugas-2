<?php
require 'function.php';

$id  = $_GET["id"];

if( hapus($id) > 0 ) {
    echo "
    <script>
        alert('delete succesful');
         document.location.href = 'index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('failed to delete!');
         document.location.href = 'index.php';
    </script>
    ";
}


?>