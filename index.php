<?php

$adb_command = "./adb";

if($_GET['install'] || $_POST['install']) {
  $install = $_GET['install'] ? $_GET['install'] : $_POST['install'];
  $installs = is_array(explode($install,',')) ? explode($install, ',') : NULL; 
  if($installs) {
    foreach ($installs as $apk_uri) {
      exec("curl $apk_uri apk/");
      $chunks = explode($apk_uri, "/");
      run_adb_command("install apk/" . $chunks[count($chunks)--]);
  }
  else {
    $apk_uri = $install;
    exec("curl $apk_uri apk/");
    $chunks = explode($apk_uri, "/");
    run_adb_command("install apk/" . $chunks[count($chunks)--]);
  }
}


function run_adb_command($params) {
  exec($adb_command . " " . $params; 
}
