<?php
require_once("database.php");

class Student extends DatabaseObject
{
    
   protected static $table="studenti";
   protected static $fields=array("index","ime","prezime","pol","iroditelja","pol","jmbg","fiksni","mobilni","grad","adresa","mail");
   public $indeks;
   public $ime;
   public $prezime;
   public $pol;
   public $iroditelja;
   public $jmbg;
   public $fiksni;
   public $mobilni;
   public $grad;
   public $adresa;
   public $mail;
   
   
    public function full_name()
    {
        return $this->ime." ".$this->prezime;
        
    }

    
    
}


?>