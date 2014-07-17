<?php
require_once("database.php");

class Smer extends DatabaseObject
{
    

protected static $table="smerovi";
protected static $fields=array("sifra_s","naziv_s","s_naziv_s","sifra_o");

public $id;
public $sifra_s;
public $naziv_s;
public $s_naziv_s;
public $sifra_o;


}
?>