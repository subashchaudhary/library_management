<?php 
class validation
{
	 function validateData($data)
	 {
	 	$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	 }
	function nameVal($username)
	{
	  	if (!preg_match("/^[a-zA-Z ]*$/",$username))
      		return true;
      	else
      		return false;

	}
	function passVal($password)
	{
		$passlen = strlen($password);
		if($passlen < 8)
			return 1;
		else
			return 0;
	}
	function emailVal($email)
	{
		if(!filter_var($email,FILTER_VALIDATE_EMAIL))
			return true;
		else
			return false;
	}
}



 ?>