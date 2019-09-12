<?php 
class functions
{
	public function length($req,$Fname,$min,$max)
	{

		if(strLen($req)<$min || strLen($req) >$max)
		{
			return $GLOBALS['arr'] [] = "$Fname must be between $min and $max";
		}
	}
	public function confirmed_password($pass1,$pass2)
	{
		if($pass1 !=$pass2)
		{
			$GLOBALS['arr'] []  = "password is not matched";
		}
		return true;
	}
	public function pattern($req,$Fname)
	{
		if(preg_match('/[^A-Za-z0-9]/',$req))
		{
			return $GLOBALS['arr'] []  =  "$Fname can only  contain alphanumeric characters ";
		}
		return true ;
	}
	public function NOT_NULL($req,$fname){
		if(empty($req))
		{

			return  $GLOBALS['arr'] [] ="$fname can not be empty";
		}
		return true;

	}




}


?>
