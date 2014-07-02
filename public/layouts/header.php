<?php

if(isset($_GET['tabela']))
{
  $tabela=$_GET['tabela'];
}
else
{
  $tabela="";
}

?>
<!DOCTYPE HTML>
<html>
  <head>
    <title>VSTSSC</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name ="description" content ="Studenti">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="../style_css/main.css" type="text/css" media="all">
  </head>
  <body>
    <div id="header">
      <h1><?php echo ucfirst($tabela);?></h1>
    </div>
    <div id="main">
