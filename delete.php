<?php
$path = './apk/';

if (isset($_POST['filename'])) {
    $file = $_POST['filename'];
    if (unlink($path.$file)) {
        echo "刪除成功！";
    } else {
        echo "刪除失敗！";
    }
}
?>