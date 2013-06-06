<?php

/**
* Util
* @pixelogic Omar Melendez
*/
class Util
{
    public static function stringHasKeywords($message, $keywords)
    {
        $regEx = "/(" . implode("|", $keywords) . ")/"; //  '/(badword1|badword2)/'
        if (preg_match($regEx, $message) > 0) { return true; }
        else {return false;}
    }

    public static function isUniqueArray($array)
    {
    	return (count(array_unique($array)) == count($array)) ;
    }

    public static function ValidateEmails($emails)
    {
		$result = true;

		foreach($emails as $email){
			if(!self::ValidateEmail($email)) {
				$result = false;
				break;
			}
		}

		return $result;
    }

    public static function ValidateEmail($email)
    {
		return filter_var($email, FILTER_VALIDATE_EMAIL);		
    }
}