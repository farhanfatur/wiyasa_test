<?php 
ob_start();

$directioncache = "../cache/cache.html";
$start = @$_GET['start'];
$end = @$_GET['end'];
$cacheopen = fopen($directioncache, "r+");
$read = file_get_contents($directioncache);

if(empty($read)) {
	$file = "../lib/companies.csv";
	$csv = file_get_contents($file);
	$array = array_map("str_getcsv", explode("\n", $csv));
	fwrite($cacheopen, json_encode($array));
	$dataPaging = array_chunk($array, 20);
	$result = [];
	$allData = [];
	foreach($array as $i => $val) {
		if($i > 0) {
			$allData[] = $val;
		}
		if($i >= $start && $i <= $end) {
			$result[] = $val;
		}
	}
	print_r(json_encode(array("data" => $result, "paging" => $dataPaging, 'result' => $allData)));
}else {
	$result = [];
	$dataDecode = json_decode($read);
	$dataPaging = array_chunk($dataDecode, 20);
	$allData = [];
	foreach($dataDecode as $i => $val) {
		if($i > 0) {
			$allData[] = $val;
		}

		if($i >= $start && $i <= $end) {
			$result[] = $val;
		}
	}
	print_r(json_encode(array("data" => $result, "paging" => $dataPaging, 'result' => $allData)));
}
?>

