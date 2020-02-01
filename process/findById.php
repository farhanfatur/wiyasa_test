<?php 
$directioncache = "../cache/cache.html";
$id = $_GET['id'];
$start = $_GET['start'];
$end = $_GET['end'];
$cacheopen = fopen($directioncache, "r+");
$read = file_get_contents($directioncache);
$result;
$data = json_decode($read);
foreach($data as $i => $val) {

	if($i >= $start && $i <= $end) {
		if($val[0] == $id) {
			$result = $val;
			break;
		}
	}

}
$json = json_encode($result);
print_r($json);
 ?>