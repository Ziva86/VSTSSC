<?php
require_once("database.php");
require_once("database_object.php");
class Odsek extends DatabaseObject
{
    

protected static $table="odseci";
protected static $fields=array("sifra","naziv_o","s_naziv_o");
public $id;
public $sifra;
public $naziv_o;
public $s_naziv_o;

         
        function find_dupicate_all()
        {
            
            global $database;
            $attributes=$this->sanitized_attributes();
            $attributes_pairs=array();
                foreach($attributes as $key=>$value)
                {
                
                    $attributes_pairs[]="{$key}='{$value}'";
                    
                }
            
            $result=$database->query("SELECT * FROM ".static::$table. " WHERE ".join(" OR ",$attributes_pairs));
          // echo $database->num_rows($result);
           if($database->num_rows($result)!=0)
           {
            return false;
           }
           else
           {
            return true;
           }
           //!empty($result)?array_shift($result):false;
        }

}

            
?>