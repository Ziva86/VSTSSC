<?php
include_once("../../includes/initialize.php");

//upit za dobijanje naziva tabele i naziva kolona $polja
$upit=$database->query("SELECT * FROM odseci");

//broji koliko ima ukupno unetih redova u tabeli studenti
//$num_rows=$database->num_rows($upit);

//upit za smestanje podataka iz tabele u promenljivu $odseci
$odseci=Odsek::find_all();
$tabela=$database->fetch_field($upit);
$_GET['tabela']=$tabela->table;
include_once("../layouts/header.php");


?>
<form action="<?php  $_SERVER['PHP_SELF']; ?>" method='post'>
<table>
     <tr>
     <?php
          //prikazuje koje sve kolone postoje u tabeli izbegavanje prikazivanja pve kolone(id) i dobijanje naziva tabele
          while($polja=$database->fetch_field($upit)):
          if($polja->name=='id')
            {
               continue;
            }
     ?>
          <th style='border:solid 1px'><?php echo ucfirst($polja->name);?></th>
    <?php
          //kraj petlje za prikaz naziva kolona u tabeli
          endwhile;
     ?>
     </tr>
    <?php
          //prikaz podataka koji se nalaze u promenljivoj $odseci
          foreach($odseci as $odsek):
     ?>
    <tr>
        <td><?php echo $odsek->sifra; ?></td>
        <td><?php echo $odsek->naziv_o; ?></td>
        <td><?php echo $odsek->s_naziv_o; ?></td>
        <td><input type="checkbox" name=checkbox[] value="<?php echo $odsek->id;?>"/></td>
    </tr>
    
    <?php

 //kraj izlistavanja podataka iz promenljive $odseci
          endforeach;
          
    ?>
</table>

<input id='delete' type='submit' class='button' name='delete' value='Delete'/>
</form>
<?php

if(isset($_POST['delete'])) // from button name="delete"
	 {
               if(isset($_POST['checkbox']))
                {
                    $checkbox = $_POST['checkbox']; //from name="checkbox[]"
                     $countCheck = count($_POST['checkbox']);
                }
                else
                {
                    $checkbox='';
                    $countCheck='';
                }
                
               /* $n= new Odsek();
               $n->multi_delete($checkbox,$countCheck);
               */
               //print_r($checkbox);
              for($i=0;$i<$countCheck;$i++)
		 {
		    $del_id  = $checkbox[$i];
                    $odseci=Odsek::find_by_id($del_id);
                    $odseci->delete();
                 
                 }
                 header('Location:odseci_view.php');    
         }


include_once("../layouts/footer.php");


?>
    
    