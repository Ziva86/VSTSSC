<?php
//nesto sam promenio
//uslov za prikaza linka Unos i Pregled
if(isset($view))
{
?>
    <a href="../view/<?php echo $_GET['tabela']?>_view.php">Pregled</a>
<?php
}
else
{
?>
    <a href="../insert/<?php echo $_GET['tabela']?>_insert.php?tabela=<?php echo $_GET['tabela'];?>">Unos</a>
<?php }?>
    </div>
    <div id="footer">Copyright <?php echo date("Y", time()); ?>, Marko Živković</div>
  </body>
</html>
<?php if(isset($database)) { $database->close_connection(); } ?>