<?php
header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=<?=$judul?>.xls");

header("Pragma: no-cache");

header("Expires: 0");
?>
<html>
<style type="text/css">

body {
    margin: 0.1in;
}
#kiri {
    width: 20%;
    float: left;
    padding: 10px;
}
#kanan {
    width: 100%;
}

h1, h2, h3, h4, h5, h6, li, blockquote, p, th, td {
    font-family: Helvetica, Arial, Verdana, sans-serif; /*Trebuchet MS,*/
}
h1, h2, h3, h4 {
    color: #000000;
    font-weight: normal;
}
h4, h5, h6 {
    color: #000000;
}
h2 {
    margin: 0 auto auto auto;
    font-size: x-large;
}
li, blockquote, p, th, td {
    font-size: 80%;
}
ul {
    list-style: url(/img/bullet.gif) none;
}

#footer {
    border-top: 1px solid #000000;
    text-align: right;
}

table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    font-family: "Trebuchet MS", Arial, sans-serif;
    color: black;    
}
#ss {
    padding: 9px;
    border-top: 1px;
    border-left-style: double;
}
td, th {
    padding: 4px;
}

P.breakhere {page-break-after: always}
</style>
 <body>
     
      <div id="kanan" class="page-header">
   <br/>
        <h3 align="center"><?=$judul?></h3>
        <?=empty($periode)?'':"<h4 align='center'>Periode : ".$periode."</h4>"?>
        <?=empty($keg)?'':"<h4 align='center'>".$keg."</h4>"?>
        </div>
<hr/>        
  

<?php $this->load->view($isi)?>
<br/>
  
</body>
</html>