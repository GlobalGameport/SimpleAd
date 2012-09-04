<?php



$pgurl = trim(strtolower(urldecode($_GET['url']))); 
$format = trim(strtolower(urldecode($_GET['f'])));

$gid = _simplead_get_adGrpId($pgurl);
if (!$format) $format = 'leaderboard';
$ad = _simplead_random_top_ad($gid); 

$block = _simplead_format($ad, $format);

_simplead_output_js($block);


function _simplead_random_top_ad($gid) { 
  include_once('ads.inc.php');
  $ads = multisort($ads[$gid], 'weight', 'formats', 'type');
  
  $cads = count($ads);

  for($i=0;$i==$cads;$I++) {
    $rand = rand(1,100);
    if($rand >= 90) {
      return $ads[$i];
    }
  }
    if (rand(1,100)<20) shuffle($ads); 

    $ad = array_shift($ads);

  return $ad;
}

function _simplead_output_js($js){
 header('Content-Type: text/javascript; charset=UTF-8');
 echo  $js;  
 exit;
}

function  _simplead_get_adGrpId($pgurl) { 
  $domain = parse_url($pgurl, PHP_URL_HOST); 
  if (!$domain) {
    $domain = '*';
  } else {
    $parts = explode(".", $domain);
    $parts = array_reverse($parts);
    $domain = $parts[1].'.'.$parts[0];
    if(isset($parts[3]))
    $host = $parts[3];
  }
  
  
  include_once('domains.inc.php');
  
  if(isset($host) && array_key_exists($host.'.'.$domain, $domain_mappings)){
      $gid = $domain_mappings[$host.'.'.$domain];
  }
  elseif(array_key_exists($domain, $domain_mappings)) {
    $gid = $domain_mappings[$domain];
  }
  else {
    $gid = $domain_mappings['*'];
  }
    
  return $gid;  
}

/*
define("REDIRECT", 0);
define("CODE", 1);
define("IMAGE", 2);
*/
function _simplead_format($ad, $format) {

  if(isset($ad['formats'][$format])){
    $adf = $ad['formats'][$format];
    switch($ad['type']) {
      case 0:
      case 1:
          return $adf['code']; 
      break;
      case 2:
          $code = 'document.write(\'<a href="'.$adf["url"].'" ><img type="text/javascript" src="'.$adf["image"].'" /><\/a>\');';
          return $code;
      break;
    }
  }
}
// function _simplead_redirect_and_continue($url) {
  // header( "Location: ".$url ) ;
  // ob_end_clean(); //arr1s code
  // header("Connection: close");
  // ignore_user_abort();
  // ob_start();
  // header("Content-Length: 0");
  // ob_end_flush();
  // flush(); // end arr1s code
  // session_write_close(); // as pointed out by Anonymous
 // }
 function multisort($array, $sort_by, $key1, $key2=NULL, $key3=NULL, $key4=NULL, $key5=NULL, $key6=NULL){
    // sort by ?
    foreach ($array as $pos =>  $val)
        $tmp_array[$pos] = $val[$sort_by];
    arsort($tmp_array);
   
    // display however you want
    foreach ($tmp_array as $pos =>  $val){
        $return_array[$pos][$sort_by] = $array[$pos][$sort_by];
        $return_array[$pos][$key1] = $array[$pos][$key1];
        if (isset($key2)){
            $return_array[$pos][$key2] = $array[$pos][$key2];
            }
        if (isset($key3)){
            $return_array[$pos][$key3] = $array[$pos][$key3];
            }
        if (isset($key4)){
            $return_array[$pos][$key4] = $array[$pos][$key4];
            }
        if (isset($key5)){
            $return_array[$pos][$key5] = $array[$pos][$key5];
            }
        if (isset($key6)){
            $return_array[$pos][$key6] = $array[$pos][$key6];
            }
        }
    return $return_array;
    }
    
    
function debug($var) {
print "<pre>";
var_dump($var);
print "</pre>";
}
 ?>