<?
if( isset($_FILES['files']) && $_FILES['files']['error']==0 ){
	$upload_folder = dirname(dirname(__FILE__))."/apkList";
	$upload_path = $upload_folder."/apk/".$_FILES['files']['name'];
	move_uploaded_file($_FILES['files']['tmp_name'], $upload_path);
	echo '上傳成功！';
	exit;
}
echo "Error: " . $_FILES["file"]["error"] . "<br />";
exit();
?>