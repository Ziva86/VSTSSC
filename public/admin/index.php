<?php
include_once("../../includes/initialize.php");
include_once("../layouts/header.php");

$d=Student::find_by_id(1);
$n=new Student();
echo $d->mobilni;
//print_r ($d->find_all());
//echo $d->$database->num_query;
//echo $n->full_name();

$studenti=Student::find_all();
echo count($studenti);

$odsek=Odsek::find_all();
print_r($odsek);
?>
<table>

<?php
foreach($studenti as $student)
{
    echo "Indeks: ".$student->indeks."</br>";
    echo "Ime: ".$student->full_name()."</br>";
}

?>


</table>
<?php
include_once("../layouts/footer.php");

?>