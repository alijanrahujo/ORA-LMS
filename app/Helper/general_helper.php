<?php

if (!function_exists('get_status')) {
	function get_status($val)
	{
		if ($val == 1) {
			return "Activate";
		} else if ($val == 0) {
			return "Deactivate";
		}
	}
}

if (!function_exists('get_average')) {
	function get_average($arr)
	{
		$sum = 0;
		$num = 0;
		foreach ($arr as $val) {
			if (isset($val) && $val > 0) {
				$sum += $val;
				$num++;
			}
		}
		if ($sum > 0) {
			return $sum / $num;
		} else {
			return 0;
		}
	}
}


if (!function_exists('num_format')) {
	function num_format($val)
	{
		return number_format(round($val, 2), 2);
	}
}

if (!function_exists('num_format2')) {
	function num_format2($val)
	{
		return number_format(round($val, 0), 0);
	}
}

if (!function_exists('num_avg')) {
	function num_avg($val, $qty)
	{
		return ($qty > 0) ? $val / $qty : 0.00;
	}
}

if (!function_exists('short_date')) {
	function short_date($val)
	{
		return date('d-m-Y',strtotime($val));
	}
}

if (!function_exists('long_date')) {
	function long_date($val)
	{
		return date('d-m-Y h:i:s A',strtotime($val));
	}
}

if (!function_exists('total_milk')) {
	function total_milk($arr)
	{
		return (object) [
			'gv' => ($arr['gv']) ? $arr['gv'] : 0.00,
			'fat' => ($arr['gv']) ? $arr['fat'] / $arr['gv'] : 0.00,
			'lr' => ($arr['gv']) ? $arr['lr'] / $arr['gv'] : 0.00,
			'snf' => ($arr['gv']) ? $arr['snf'] / $arr['gv'] : 0.00,
			'percentage' => ($arr['gv']) ? $arr['percentage'] : 0.00,
			'ts' => ($arr['gv']) ? $arr['ts'] : 0.00,
			'temperature' => ($arr['gv']) ? $arr['temperature'] / $arr['gv'] : 0.00,
		];
	}
}

if (!function_exists('total_milk2')) {
	function total_milk2($arr, $arr2)
	{
		$result = (object) array();
		$result->gv = ($arr->gv || $arr2->gv) ? $arr->gv + $arr2->gv : 0.00;
		$result->fat = ($result->gv > 0) ? ((($arr->fat * $arr->gv) + ($arr2->fat * $arr2->gv)) / ($arr->gv + $arr2->gv)) : 0.00;
		$result->lr = ($result->gv > 0) ? ((($arr->lr * $arr->gv) + ($arr2->lr * $arr2->gv)) / ($arr->gv + $arr2->gv)) : 0.00;
		$result->snf = ($result->gv > 0) ? ((($arr->snf * $arr->gv) + ($arr2->snf * $arr2->gv)) / ($arr->gv + $arr2->gv)) : 0.00;
		$result->percentage = ($result->gv > 0) ? (($arr->percentage) + ($arr2->percentage)) : 0.00;
		$result->ts = ($result->gv > 0) ? (($arr->ts) + ($arr2->ts)) : 0.00;
		$result->temperature = ($result->gv > 0) ? ((($arr->temperature * $arr->gv) + ($arr2->temperature * $arr2->gv)) / ($arr->gv + $arr2->gv)) : 0.00;

		return $result;
	}
}


if (!function_exists('check_logs')) {
	function check_logs($previous, $updated)
	{
		$responce = null;
		foreach ($updated as $key => $value) {
			// 	print_r($value);
			if (isset($previous[$key]) && $updated[$key] != $previous[$key]) {
				$responce .= $key . ' : from ' . num_format($previous[$key]) . ' to ' . num_format($updated[$key]) . ', ';
			}
		}
		return substr($responce, 0, -2);
	}
}
