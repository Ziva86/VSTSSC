<?php
include_once("../../includes/initialize.php");

//upit za dobijanje naziva tabele i naziva kolona $polja
$upit=$database->query("SELECT * FROM studenti");

//broji koliko ima ukupno unetih redova u tabeli studenti
// $num_rows=$database->num_rows($upit);

//upit za smestanje podataka iz tabele u promenljivu $sudenti
$sudenti=Student::find_all();
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
               $_GET['tabela']=$polja->table;
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
          //prikaz podataka koji se nalaze u promenljivoj $sudenti
          foreach($sudenti as $student):
     ?>
    <tr>
        <td><?php echo $student->indeks; ?></td>
        <td><?php echo $student->ime; ?></td>
        <td><?php echo $student->prezime; ?></td>
        <td><?php echo $student->pol; ?></td>
        <td><?php echo $student->iroditelja; ?></td>
        <td><?php echo $student->jmbg; ?></td>
        <td><?php echo $student->fiksni; ?></td>
        <td><?php echo $student->mobilni; ?></td>
        <td><?php echo $student->grad; ?></td>
        <td><?php echo $student->adresa; ?></td>
        <td><?php echo $student->mail; ?></td>
    </tr>
    <?php
          //kraj izlistavanja podataka iz promenljive $sudenti
          endforeach;
    ?>
</table>
<?php
include_once("../layouts/footer.php");
?>
    
    