<?php
$n=array('h'=>1,'k'=>2,'o'=>3);
$m=array(1,2,3);

$mare=array_change_key_case($n,CASE_UPPER);

$arr = array("FirSt" => 1, "yađšćčž" => "Oil", "şekER" => "sugar");

function array_unicode($arr,$c=CASE_LOWER)
{
         $c=($c==CASE_LOWER)? MB_CASE_LOWER : MB_CASE_UPPER;
         foreach($arr as $k=>$v)
         {
                  $ret[mb_convert_case($k,$c,"ISO-8859-14")]=$v;
         }
         return $ret;
}

print_r(array_unicode($arr,CASE_UPPER));

$polje="";
$mysql_data_type_hash = array(
    1=>'tinyint',
    2=>'smallint',
    3=>'int',
    4=>'float',
    5=>'double',
    7=>'timestamp',
    8=>'bigint',
    9=>'mediumint',
    10=>'date',
    11=>'time',
    12=>'datetime',
    13=>'year',
    16=>'bit',
    //252 is currently mapped to all text and blob types (MySQL 5.0.51a)
    253=>'varchar',
    254=>'char',
    246=>'decimal'
    );
echo "<pre>";
print_r($mysql_data_type_hash);
echo "</pre>";

echo $p=gettype($polje);

foreach ($mysql_data_type_hash as $k=>$v)
{
         if($v==gettype($polje))
         {
                  echo $v.' '.$k;
         }
}


function someFunction() 
{
}

$functionVariable = 'someFunction';

var_dump(is_callable($functionVariable, false, $callable_name));  // bool(true)

echo $callable_name, "\n";  // someFunction





class someClass {

  function someMethod() 
  {
  }

}

$anObject = new someClass();

$methodVariable = array($anObject, 'someMethod');

var_dump(is_callable($methodVariable, true, $callable_name));  //  bool(true)

echo $callable_name, "\n";  //  someClass::someMethod


echo "<br/>";
$mynumstr = "100,000,000.75";
$mynum = doubleval(str_replace(",","",$mynumstr));
echo "Normal Value:".number_format($mynum);
echo "<br/>";


$var = 0;

// Evaluates to true because $var is empty
if (empty($var)) {
    echo '$var is either 0, empty, or not set at all';
}

// Evaluates as true because $var is set
if (isset($var)) {
    echo '$var is set even though it is empty';
}



echo "<br/>";
$expected_array_got_string = 'somestring';
var_dump(empty($expected_array_got_string['some_key']));
var_dump(empty($expected_array_got_string[0]));
var_dump(empty($expected_array_got_string['0']));
var_dump(empty($expected_array_got_string[0.5]));
var_dump(empty($expected_array_got_string['0.5']));
var_dump(empty($expected_array_got_string['0 Mostel']));

echo "<br/>";

$b = array(1, 1, 2, 3, 5, 8);
$arr = get_defined_vars();

// print $b
print_r($arr["b"]);

echo "<br/>";

echo $arr["_"];

echo "<br/>";


// print all the available keys for the arrays of variables
print_r(array_keys(get_defined_vars()));
$nn=1;
echo gettype($nn);

echo "<br/>";
$b = 3.1;
$v = var_export($b);
echo $v;
echo "<br/>";



?>