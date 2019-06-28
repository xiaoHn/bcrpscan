<?php

function sqlsafe_replace($string) {
 $string = str_replace('\'','\"',$string);
 $string = str_replace('>',' ',$string);
 $string = str_replace('%',' ',$string);
 $string = str_replace('#',' ',$string);
 $string = str_replace('\\',' ',$string);
 $string = str_replace('http://',' ',$string);
 $string = str_replace('`',' ',$string);
 $string = str_replace('\/',' ',$string);
 $string = str_replace('/',' ',$string);
 $string = str_replace('\"','',$string);
 $string = str_replace(':','',$string);
 $string = str_replace('https',' ',$string);
 return $string;
}
