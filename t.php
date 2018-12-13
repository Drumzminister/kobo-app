<?php

$currencies = [5, 10, 20, 50, 100, 200, 500, 1000];

$money = 30;

$change = [];

$monies = array_filter($currencies, function ($value) use($money) {
	return $money > $value;
});

if (count($monies) > 2) {
	$leftOver = 0;
	foreach ($monies as $m) {
		if (in_array($leftOver, $monies)) {
			$change[] = $leftOver;
		}
		$leftOver = $money - $m;
		echo  $leftOver , PHP_EOL;
	}

	print_r($change);
} else {
	$sum = $monies[0] + $monies[1];

	if ($sum !== $money) {
		exit("No currency for change");
	} else {
		print_r($monies);
	}
}

//print_r($monies);