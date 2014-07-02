<?php
include_once("../../includes/initialize.php");

include_once("../layouts/header.php");
$upit=$database->query("SELECT * FROM smerovi");
$upit_o=$database->query("SELECT * FROM odseci ORDER BY id DESC");
?>
<?php
//u slucaju da je pritisnuto dugme submit(Unesi)
if(isset($_POST['submit']))
{
    //inicializacija clase Odsek
    $smer=new Smer();
   
        //izlistavanje atributa iz klase i dodeljivanje POST promenljivih
        foreach($smer->attributes()as $key=>$value)
        {
             if($key=='id')
             {
                 continue;
             }
             $smer->$key=$_POST[$key];
             echo $smer->$key;
        }
        //unos podataka u tabelu odseci
         $smer->create();
// print_r($_POST);
 //$nesto=array_combine($odsek->attributes(),$niz);
 //print_r($nesto);
 
/* print_r($m);
 print_r($niz);*/
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
                if($polja->name=='sifra_o')
                {
          ?>       
                <label><?php echo $polja->name;?>: </label>  
                 <select name="sifra_o">
                   <option value=""></option>
          <?php
                while($row=$database->fetch_array($upit_o))
                  {
          ?>
                    <option value="<?php echo $row['sifra'];?>"><?php echo $row['naziv_o'];?></option>
          <?php       
                  }
                  continue;
                 }
          ?>
            
                <label><?php echo $polja->name;?>: </label>  
                 <input type="text" name="<?php echo $polja->name;?>" value="" size=10 />
                <br />
            <?php endwhile;?>
            </select>
              <br />
             <input type="reset" name="reset" value="Ponisti">
             <input type="submit" name="submit" value="Unesi"> 
        </form>
        
<?php
$view='view';
//echo $view;
include_once("../layouts/footer.php");

?>
