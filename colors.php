<?php

	//random color generator
	define( COL_MIN_AVG, 64 );
	define( COL_MAX_AVG, 192 );
	define( COL_STEP, 16 );

	function usercolor( $username ) {
        $range = COL_MAX_AVG - COL_MIN_AVG;
        $factor = $range / 256;
        $offset = COL_MIN_AVG;

        $base_hash = substr(md5($username), 0, 6);
        $b_R = hexdec(substr($base_hash,0,2));
        $b_G = hexdec(substr($base_hash,2,2));
        $b_B = hexdec(substr($base_hash,4,2));

        $f_R = floor((floor($b_R * $factor) + $offset) / COL_STEP) * COL_STEP;
        $f_G = floor((floor($b_G * $factor) + $offset) / COL_STEP) * COL_STEP;
        $f_B = floor((floor($b_B * $factor) + $offset) / COL_STEP) * COL_STEP;

        return sprintf('#%02x%02x%02x', $f_R, $f_G, $f_B);
	}
	
	echo usercolor(rand());