<?php

// WARNING Do not install this on a live server connected to the Internet. There are major security flaws. 
// This is intended for local use only. K Thanks.

include "settings.php";

if($_GET['op'] == "install" && ($_GET["apk"] || $_POST['apk'])) {

  // Get the parameter or parameters given either as POST or GET
  $param = $_GET['apk'] ? $_GET['apk'] : $_POST['apk'];
  $params = is_array(explode(',', $param)) ? explode(',', $param) : NULL; 

  if($params) {

    foreach ($params as $apk_uri) {
      $file_path = apk_prepare($apk_uri);
      run_adb_command("install $file_path");
      apk_cleanup($file_path);
    }

  }
  else {
    $file_path = apk_prepare($param);
    run_adb_command("install $file_path");
    apk_cleanup($file_path);
  }

}


function apk_prepare($apk_uri) {

  // Get the filename from the url
  $chunks = explode("/", $apk_uri);
  $index = count($chunks);
  $index--;
  $file_name = $chunks[$index];

  // Download the file
  file_put_contents("apk/$file_name", fopen($apk_uri, 'r'));

  // Return the prepared apk's file path
  global $apk_folder;
  return "$apk_folder/$file_name";
} 


function run_adb_command($params) {
  global $adb_command;
  $full_command = $adb_command . " " . $params; 
  print $full_command;
  exec($full_command);
}


function apk_cleanup($file_path) {
  unlink($file_path);
}
