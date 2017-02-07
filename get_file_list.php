<?
$dir = "./apk";

// 判斷是否為目錄
if(is_dir($dir)){

if ($dh = opendir($dir)) {

	$fileList = array();
	
	while (($file = readdir($dh)) !== false) {

		if (strpos( $file, '.apk')){

			$fileItem = array();

			$fileItem["filename"] = $file;
			$fileItem["filetime"] = date ("Y/m/d H:i", filemtime($dir.'/'.$file));

			array_push($fileList, $fileItem);
		}
	}

echo json_encode($fileList);
closedir($dh);
}

}
?>