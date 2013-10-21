<?php
class practice_controller extends base_controller {
    
public function test_db(){

	#$q = 'INSERT INTO users SET first_name = "Albert", last_name = "Einstein"';
	#echo $q;

	#DB::instance(DB_NAME)->query($q);

	#QUERY BUILDER

#	$new_user = Array(
#		'first_name' => 'Albert',
#		'last_name' => 'Einstein',
#		'email' => 'albert@einstein.com',
#		);

#	DB::instance(DB_NAME)->insert('users', $new_user);

	#$q = 'SELECT email FROM users WHERE user_id = 9';
	#echo DB::instance(DB_NAME)->select_field('users', $q);

	$_POST['first_name'] = 'Albert';
	#$_POST = DB::instance(DB_NAME)->sanitize($_POST);
	$q = 'SELECT email FROM users WHERE first_name = "'.$_POST['first_name'].'"';
	echo DB::instance(DB_NAME)->select_field($q);

}


}
 ?>