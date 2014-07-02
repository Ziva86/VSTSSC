<?php
include_once("../../includes/initialize.php");
include_once("../layouts/header.php");

$upit=$database->query("SELECT * FROM odseci");
$niz=array();
$message=array();

$n='';

?>
<?php
//u slucaju da je pritisnuto dugme submit(Unesi)
if(isset($_POST['submit']))
{
    if(empty($message))
        {
            $message='';
        }

    //inicializacija clase Odsek
    $odsek=new Odsek();
    $d=$odsek->nova();
    print_r($d);
    //print_r($odsek->attributes());
   
   //$odsek->fields;
    foreach($odsek->attributes() as $key=>$value)
    {
      $odsek->$key=$_POST[$key];
    }
    
    $odsek->attributes();
    $num_fields=array('sifra'=>$_POST['sifra']);
    $sting_fields=array('naziv_o'=>$_POST['naziv_o'],'s_naziv_o'=>$_POST['s_naziv_o']);
 
    $nije_broj=$odsek->validacija_broj($num_fields);
    $prazno=$odsek->validacija_prazno_polje($odsek->sanitized_attributes());
    $nije_string=$odsek->validacija_string($sting_fields);

    if($prazno==false)
    {
        echo "Sva polja moraju biti popunjena";
    }
    elseif($nije_broj==false)
    {
            echo "Polje sifra mora biti broj";
    }
    elseif($odsek->find_dupicate_odsek($_POST['sifra'])==false)
    {
        echo "Podaci za sifru <b>$odsek->sifra</b> vec postoje";
    }
    elseif($nije_string==false)
    {
       echo 'Nije string';
    }
    else
    {
    echo "Podaci su uspesno uneti.";
    $odsek->create();
    foreach($odsek->attributes() as $key=>$value)
    {
      $_POST[$key]='';
      $odsek->$key='';
   
    }
    }
   


}

/*9$up=Odsek::find_by_id(341);
$up->sifra=89;
$up->update();*/

/*$odsek=Odsek::find_by_id(340);
$odsek->delete();*/
//echo $message;
 
//$message['sifra']='Mare';
//$i=0;
?>
        <form name="unos_s" action='' method='post'>
        
          <?php
         
        while($polja=$database->fetch_field($upit)):
               
       if($polja->name=='id')
                {
            ?>
                 <input type="hidden" name="<?php echo $polja->name;?>" value="" size=10 />
            <?php 
                    continue;
                }
          ?>
                 <label><?php echo $polja->name;?>: </label>  
                 <input type="text" name="<?php echo $polja->name;?>"
                         value="<?php if(isset($_POST[$polja->name])){echo $_POST[$polja->name];}else{echo $_POST[$polja->name]="";} ?>" size=10 />
                         <?php echo $polja->type;?>
                 <br />
          <?php endwhile;?>
                <input type="reset" name="reset" value="Ponisti">
                <input type="submit" name="submit" value="Unesi"> 
        </form>

<?php
$view='view';
//echo $view;
include_once("../layouts/footer.php");
?>
    
    