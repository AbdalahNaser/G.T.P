<?php

function checkLogin($conn)
{

	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from sign_up where user_id = '$id'";

		$result = mysqli_query($conn,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}


	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) {
		# code...

		$text .= rand(0,9);
	}

	return $text;
}
