<?php
require_once("database.php");

class DatabaseObject
{
    
    protected static $table;
    public $mysql_data_type_hash = array(
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
   
    public static function find_all()
    {
        global $database;
        $result=self::find_by_sql("SELECT * FROM ".static::$table);
        
        return $result;
    }
    
    public static function find_by_id($id)
    {
        global $database;
        $result_array=self::find_by_sql("SELECT * FROM ".static::$table." WHERE id={$id}");
        return !empty($result_array)?array_shift($result_array):false;
    }
    
    public static function find_by_sql($sql="")
    {
        global $database;
        $num='';
        $result=$database->query($sql);
        //$database->num_rows($result);
        $object_array=array();
        while($row=$database->fetch_array($result))
        {
            $object_array[]=self::instatiate($row);
        }
        return $object_array;
    }
    
    
    private static function instatiate($record)
    {
        $class_name=get_called_class();
        $object=new $class_name;
        
        foreach($record as $attribute=>$value)
        {
            if($object->has_attribute($attribute))
            {
                $object->$attribute=$value;
            }
        }
        return $object;
    }
    
    
    private function has_attribute($attribute)
    {
        $object_vars=get_object_vars($this);
        return array_key_exists($attribute,$object_vars);
    }
    
    public function create()
    {
        global $database;
        $attributes=$this->sanitized_attributes();
        $sql= "INSERT INTO ".static::$table."( ";
        $sql.= join(", ", array_keys($attributes));
        $sql.= ")VALUES('";
        $sql.= join("', '", array_values($attributes));
        $sql.= "')";
        if($database->query($sql))
           {
            $this->id=$database->insert_id();
            return true;
           }
           else
           {
            return false;
           }   
    }
       
    
    
    public function update()
    {
        global $database;
        $attributes=$this->sanitized_attributes();
        $attributes_pairs=array();
        foreach($attributes as $key=>$value)
        {
            $attributes_pairs[]="{$key}='{$value}'";
            
        }
        $sql="UPDATE ".static::$table." SET ";
       print_r($sql.=join(",",$attributes_pairs));
        $sql.=" WHERE id=".$database->mysql_prep($this->id);
        $database->query($sql);
        return($database->affected_rows()==1)?true:false;
    }
    

    public function save()
    {
        return isset($this->id)?$this->update():$this->create();
    }
    
    
    public function delete()
    {
        global $database;
        
        $sql="DELETE FROM ".static::$table;
        $sql.=" WHERE id=".$database->mysql_prep($this->id);
        $sql.=" LIMIT 1";
        $database->query($sql);
        return ($database->affected_rows()==1)?true:false;
        
    }
    
    public function multi_delete($checkbox,$countCheck)
    {
  
		
               for($i=0;$i<$countCheck;$i++)
		 {
			 $del_id  = $checkbox[$i];
                       print_r ($this->find_by_id($del_id));
                         $this->delete();
                         
 
                 }
             
               return  header('Location:odseci_view.php');
          
 
    }
    
  

	public function attributes()
        { 
		// return an array of attribute names and their values
	  $attributes = array();
	  foreach(static::$fields as $field) {
	    if(property_exists($this, $field)) {
	      $attributes[$field] = $this->$field;
	    }
	  }
	  return $attributes;
	}


    public function sanitized_attributes()
    {
	global $database;
        $clean_attributes=array();
	foreach($this->attributes() as $key => $value)
	{
	    $clean_attributes[$key]=$database->mysql_prep($value);
	}
	return $clean_attributes;
    }
    
    
                public function validacija_prazno_polje($values)
           {
                     global $database;
                     //$niz=array();                   
                      
                    foreach($values as $key=>$value)
                    {
                        
                        //$niz[$key]=$value;
                        if(empty($value))
                        {
                           // echo 'Prazno polje: '.$key;
                            
                        return false;
                        }
                        
                        
                        
                        
                        
                    }
                   // print_r($niz);
                   return true; 
                
            }
            
            public function validacija_broj($values)
            {
                
                foreach($values as $key=>$value)
                    {
                        
                        if(!is_numeric($value) && $value==0)
                        {
                           //echo "Polje {$key} mora biti broj!";
                            return  false;
                        }
                    }
                    return true; 
            }
            public function validacija_string($values)
            {
                $broj=count($values);
               foreach($values as $key=>$value)
                    {
                        if(is_numeric($value))
                            {
                             //echo "Polje <b>{$key}</b> ne moze biti broj!";
                             return  false;
                            } 
                    }
                return true; 
            }
            
            
            

            
            
            function nova()
            {
                global $database;
                $r=$this->attributes();
                //global $mysql_data_type_hash;
                $niz=array();
                $upit=$database->query("SELECT * FROM odseci");
                while($tip=mysqli_fetch_field($upit))
                {
                    $niz[]=$tip->type;
                    foreach($this->mysql_data_type_hash as $k=>$v)
                    {
                        if($tip->type==$k)
                        {
                            echo $v;
                        }
                    }
                    /*if($niz[$tip->type]=3)
                    {
                        echo "Bole voli Mara";
                    }*/
                }
                
                //return $niz;
                print_r($r);
                
            }




}


?>