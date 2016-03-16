<?php
date_default_timezone_set('PRC');

function run($date, $md){
	$d = date("d", strtotime($date));
	$dates = $date;
	$r = array();
	for ($i=0; $i < $md; $i++) { 
		$ff = f($dates, $d);
		$dates = $ff['m'];
		$r[] = $ff;
	}
	return $r;
}

function f($date, $md)
{
	$begin = strtotime($date);
	$m = strtotime(date("Y-m-01", strtotime($date)));
	$u = strtotime("+ 1 Months", $m);
	$min = min($md, date('t', $u));
	$end = $u + ($min - 1) * 3600 * 24;
	$day = ($end - $begin) / 3600 / 24;
	return array('m' => date('Y-m-d', $end), 'd' => $day);
}
$r = run('2016-3-31', 12);
print_r($r);
echo "\n";
