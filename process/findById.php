<?php 
$directioncache = "../cache/cache.html";
$name = $_GET['name'];
$cacheopen = fopen($directioncache, "r+");
$read = file_get_contents($directioncache);
$result;
$data = json_decode($read);
foreach($data as $i => $val) {
		if($val[1] == $name) {
			$result = $val;
			break;
		}
}
$json = json_encode($result);
print_r($json);
 ?>