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


?>