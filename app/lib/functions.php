<?php

	function if_int ($input) {
		if (is_int($input / 2) == true) {
			return 1;
		} else {
			return 2;
		}
	}
