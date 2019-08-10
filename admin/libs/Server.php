<?php

	define('URL','/capture_memories/admin/');
	define('MAIN_URL','/capture_memories/');
	
	date_default_timezone_set('Asia/Taipei');
	
	ini_set('memory_limit', '-1');
	ini_set('max_execution_time', 300);

	// macos connection
	// define('DATABASE_HOST','localhost');
	// define('DATABASE_USER','root');
	// define('DATABASE_PASS','root');
	// define('DATABASE_NAME','capture_memories');

	// windows connection
	define('DATABASE_HOST','localhost');
	define('DATABASE_USER','root');
	define('DATABASE_PASS','');
	define('DATABASE_NAME','capture_memories');