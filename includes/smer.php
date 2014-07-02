<?php
require_once("database.php");

class Smer extends DatabaseObject
{
    

protected static $table="smerovi";
public $id;
public $sifra_s;
public $naziv_s;
public $s_naziv_s;
public $sifra_o;


}
?>