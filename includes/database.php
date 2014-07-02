<?php
//require_once('config.php');
require_once("config.php");


class MySQLDatabase
{
    private $connection;
    public $last_query;
    private $real_escape_string;
    private $magic_quotes_active;
  
    
    function __construct()
    {
        $this->open_connection();
        $this->magic_quotes_active = get_magic_quotes_gpc();
	$this->real_escape_string = function_exists( "mysql_real_escape_string" ); 
    }
    
    public function open_connection()
    {
        $this->connection=@mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
        if(!$this->connection)
        {
            die("Konekcija nije uspela: ".mysqli_error());
        }
    }
    
    public function close_connection()
    {
        if(isset($this->connection))
        {
            mysqli_close($this->connection);
            unset($this->connection);
        }
    }
    
    //Kreira upit
    public function query($sql)
    {
        $this->last_query=$sql;
        $result=mysqli_query($this->connection,$sql);
        $this->confirm_query($result);
	return $result;
    }
    
    public function fetch_array($result)
    {
        return mysqli_fetch_array($result);
    }
    
    public function num_rows($result)
    {
        return mysqli_num_rows($result);
    }
    
    public function insert_id()
    {
        return mysqli_insert_id($this->connection);
    }
    
    public function affected_rows()
    {
        return mysqli_affected_rows($this->connection);
    }
    
    public function fetch_field($result)
    {
        return mysqli_fetch_field($result);
    }
    
    //Ispituje ispravnost upita
    private function confirm_query($result)
    {
        if(!$result)
        {
            $output='Upit nije uspeo: '.mysqli_error($this->connection)."</br>";
            $output.="Poslednji upit je: ". $this->last_query;
            die($output);
        }
        
    }
    

    public function mysql_prep( $value ) {
	if( $this->real_escape_string ) { // PHP v4.3.0 or higher
	    // undo any magic quote effects so mysql_real_escape_string can do the work
	    if( $this->magic_quotes_active) { $value = stripslashes( $value ); }
	    $value = mysql_real_escape_string( $value );
	} else { // before PHP v4.3.0
		// if magic quotes aren't already on then add slashes manually
		if( ! $this->magic_quotes_active ) { $value = addslashes( $value ); }
		//if magic quotes are active, then the slashes already exist
		}
	    return $value;
	}
	


    
}

$database=new MySQLDatabase();

?>