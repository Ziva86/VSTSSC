<?php
include_once("../../includes/initialize.php");
include_once("../layouts/header.php");

$upit=$database->query("SELECT * FROM studenti");

?>
<?php
//u slucaju da je pritisnuto dugme submit(Unesi)
if(isset($_POST['submit']))
{
    //inicializacija clase Odsek
    $student=new Student();
   
        //izlistavanje atributa iz klase i dodeljivanje POST promenljivih
        foreach($student->attributes()as $key=>$value)
        {
             if($key=='id')
             {
                 continue;
             }
             $student->$key=$_POST[$key];
             echo $student->$key;
        }
        //unos podataka u tabelu odseci
         $student->save();

}

/*$up=Odsek::find_by_id(4);
$up->sifra=89;
$up->update();*/
/*
$up=Odsek::find_by_id(5);
$up->delete();
*/

?>

        <form name="unos_s" action='' method='post'>
          <?php
                while($polja=$database->fetch_field($upit)):
                if($polja->name=='id')
                {
                    continue;
                }
                        
                if($polja->name=='pol')
                {
          ?>
                        
              <label> <?php echo ucfirst($polja->name);?></label>
               M
               <input type="radio" value="m" name="<?php echo $polja->name;?>"/>
               Z
               <input type="radio" value="z" name="<?php echo $polja->name;?>"/>
               <br />
               
          <?php continue;} ?>
           
                 <label><?php echo ucfirst($polja->name);?>: </label>  
                 <input type="text" name="<?php echo $polja->name;?>" value="" size=10 />
                <br />
            <?php endwhile;?>
           
           

   
            <input type="reset" name="reset" value="Ponisti">
            <input type="submit" name="submit" value="Unesi"> 
        </form>

        
   
    
    
    
    

<?php
$view='view';
include_once("../layouts/footer.php");

?>
    
    