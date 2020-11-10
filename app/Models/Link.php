<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['bigUrl','smallUrl'];

    public static function lastRecordToNumber(){
        $number = Link::orderBy('smallUrl','desc')->first()->smallUrl;
        $number = strrev($number);

        $value = 1;
        
        for($i = 0;$i<strlen($number);$i++){
            $v =  (ord($number[$i])-97) * pow(26,$i);
    		$value += $v;
        }
        return $value;
    }

    public static function calculateUrl(){

        static $startChar = 97;
        static $system = 26;
        static $minimumUrlL = 4;
        $value = 0;

        if(Link::count() > 0)
            $value = Link::lastRecordToNumber();

		$returnValue = '';
		$rest = 0;
		
		if($value == 0)
			$returnValue .= chr($startChar);
		else {
            while($value != 0) {
                $rest = $value % $system;
                $value = ($value - $rest) / $system;
                
                $returnValue .= chr($rest+$startChar);
            }
        }

        $count = strlen($returnValue);
        
        while($count < $minimumUrlL){
			$returnValue .= chr($startChar);
            $count++;
        }
        	
		
		return strrev($returnValue);
	}
}
