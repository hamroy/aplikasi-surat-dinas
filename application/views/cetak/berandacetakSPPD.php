<html>
<style type="text/css">

body {
    margin: 0.1in;
}
#kiri {
    width: 20%;
    float: left;
    padding: 30px;
}
#bagkiri {
    width: 20%;
    padding-top: 1px;
    padding-bottom: 1px;
    margin-top: 1px;
    /*background-color: red;*/
    float: left;
}
#bagkiriTtd {
    width: 50%;
    /*background: red;*/
    margin-left: 50px;  
    float: left;
}
#bagkkananTtd {
   margin-top: 30px;
}
#kanan {
    width: 100%;
    padding-left: -160px;
    /*background-color: red;*/
}
#bagkanan {
    /*background-color: green;*/
    padding-top: -10px;
    padding-bottom: 1px;
    margin-top: -5px;
    float: left;
    padding-top: -15px; 
    padding-right: 100px; 
    margin-top: 1px
    
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

.row{
    width: 100%; height: 80px; padding-top: 1px;padding-bottom: 2px;
    margin-top: -1px;
}
</style>
<?php

?>
 <!-- <body onload="print()"> -->
<body>
<style type="text/css">
  .kop{
    margin-top: 0px;
    margin-bottom: 0px;

  }
</style>
<div id="kiri" class="page-header">
  <img width="60%" src="<?='icon/logo.png'?>">
</div>
<div id="kanan" class="page-header">
<br/>
    <h4 align="center" class="kop">PEMERINTAH KABUPATEN NATUNA</h4>
    <h4 align="center" class="kop">BADAN KEPEGAWAIAN DAN PENGEMBANGAN</h4>
    <h4 align="center" class="kop">SUMBER DAYA MANUSIA</h4>
    <h6 align="center" class="kop">Jl. Batu Sisir Bukit Arai Gedung E (Semiun) Lantai Dasar </h6>
    <h6 align="center" class="kop">Provinsi Kepulauan Riau</h6>
    <h6 align="center" class="kop">e-mail : bkpsdm@natunakab.go.id  Website : www.bkpsdm.natunakab.go.id</h6>
    <h3 align="center" class="kop">R A N A I</h3>

</div>
<hr/>         


<?php $this->load->view($isi)?>
<br/>
  
</body>
</html>