<?php
include_once("../../includes/initialize.php");

//upit za dobijanje naziva tabele i naziva kolona $polja
$upit=$database->query("SELECT * FROM smerovi");

//broji koliko ima ukupno unetih redova u tabeli studenti
//$num_rows=$database->num_rows($upit);

//upit za smestanje podataka iz tabele u promenljivu $odseci
$smerovi=Smer::find_all();
$tabela=$database->fetch_field($upit);
$_GET['tabela']=$tabela->table;

include_once("../layouts/header.php");
?>

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
          foreach($smerovi as $smer):
     ?>
    <tr>
        <td><?php echo $smer->sifra_s; ?></td>
        <td><?php echo $smer->naziv_s; ?></td>
        <td><?php echo $smer->s_naziv_s; ?></td>
    </tr>
    <?php
          //kraj izlistavanja podataka iz promenljive $odseci
          endforeach;
    ?>
</table>

<?php include_once("../layouts/footer.php");?>
    
    