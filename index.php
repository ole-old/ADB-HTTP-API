<?php

$adb_command = "adb";

if($_GET['q'] == "install" && ($_['params"] || $_POST['params']) {

  // Get the parameter or parameters given either as POST or GET
  $param = $_GET['params'] ? $_GET['params'] : $_POST['params'];
  $params = is_array(explode($params,',')) ? explode($params, ',') : NULL; 

  if($params) {

    foreach ($params as $apk_uri) {
      exec("curl $apk_uri apk/");
      $chunks = explode($apk_uri, "/");
      run_adb_command("install apk/" . $chunks[count($chunks)--]);
    }

  }
  else {

    $apk_uri = $param;
    exec("curl $apk_uri apk/");
    $chunks = explode($apk_uri, "/");
    run_adb_command("install apk/" . $chunks[count($chunks)--]);

  }

}


function run_adb_command($params) {
  exec($adb_command . " " . $params; 
}
