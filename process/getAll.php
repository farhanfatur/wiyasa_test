<?php 
$directioncache = "../cache/cache.html";
$cacheopen = fopen($directioncache, "r+");
$read = file_get_contents($directioncache);
$res = [];
$data = json_decode($read);
foreach($data as $i => $val) {
	if($i >= 1) {
		
		$res[] = $val;
	}
}

$json = json_encode($res);
print_r($json);
 ?>