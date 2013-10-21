<?php

public function test_db(){

	$q = 'INSERT INTO users SET first_name = "Albert", last_name = "Einstein"';

	echo $q;

	DB::instance(DB_NAME)->query($q);
}

