<html>
<head> 
<meta charset="utf-8"> 
<title>TEMImageNet</title> 
<style> 
.divcss5{ border:1px solid #000; width:100px; height:100px;overflow:hidden} 
.divcss5 img{max-width:100px;_width:expression(this.width > 100 ? "300px" : this.width);} 
* {box-sizing: border-box;}
.row .divcss5 {
  float: left;
  width: 12.5%;
  background-color:transparent;
  border: 10px solid transparent;
}
</style>
</head>
<body>
<h2>Attribute Information</h2>
<?php
$servername = "localhost";
$username = "root";
$password = "1211";
$dbname = "temimage";
 
// establish connection
$conn = mysqli_connect($servername, $username, $password ,$dbname);
if(! $conn )
{
    die('connection failed: ' . mysqli_error($conn));
}
// Check connection
$sql;
if ($_POST['fname']=='fcc' or $_POST['fname']=='amorphous' or $_POST['fname']=='orthorhombic ')
{
	$sql = "SELECT Morphology,Lattice,`Mineral name`,`Structure name`,`Conventional name`,`Abbreviated name`,`Elements contained`,`Estimated field of view(angstrom)`,`Imaging technique`,Orientation,ID
        FROM sheet1
        WHERE Lattice='{$_POST['fname']}'";
}
elseif($_POST['fname']=='Pt' or $_POST['fname']=='C' or $_POST['fname']=='Si')
{
	$sql = "SELECT Morphology,Lattice,`Mineral name`,`Structure name`,`Conventional name`,`Abbreviated name`,`Elements contained`,`Estimated field of view(angstrom)`,`Imaging technique`,Orientation,ID
        FROM sheet1
        WHERE `Elements contained`='{$_POST['fname']}'";
}

$a=array();
if ($conn != null) {
    $query_result = $conn->query($sql);
	echo $conn->error; 
    while ($row = $query_result->fetch_row()) {
	    array_push($a,$row);
    }

	echo "Fetched data successfully\n<br>";
    $conn->close();
}
session_start();
$_SESSION['val']=$a;
$one=rand(0,count($a));
$two=rand(0,count($a));
$three=rand(0,count($a));

echo "Morphology :{$a[$one][0]}  <br> ".
         "Lattice: {$a[$one][1]} <br> ".
		 "Mineral name: {$a[$one][2]} <br> ".
		 "Structure name: {$a[$one][3]} <br> ".
		 "Conventional name: {$a[$one][4]} <br> ".
		 "Abbreviated name: {$a[$one][5]} <br> ".
		 "Elements contained: {$a[$one][6]} <br> ".
		 " Estimated field of view(angstrom): {$a[$one][7]} <br> ".
		 "Imaging technique: {$a[$one][8]} <br> ".
		 "Orientation: {$a[$one][9]} <br> ".
		 "ID: {$a[$one][10]} <br> ".
         "--------------------------------<br>";
echo "Morphology :{$a[$two][0]}  <br> ".
         "Lattice: {$a[$two][1]} <br> ".
		 "Mineral name: {$a[$two][2]} <br> ".
		 "Structure name: {$a[$two][3]} <br> ".
		 "Conventional name: {$a[$two][4]} <br> ".
		 "Abbreviated name: {$a[$two][5]} <br> ".
		 "Elements contained: {$a[$two][6]} <br> ".
		 " Estimated field of view(angstrom): {$a[$two][7]} <br> ".
		 "Imaging technique: {$a[$two][8]} <br> ".
		 "Orientation: {$a[$two][9]} <br> ".
		 "ID: {$a[$two][10]} <br> ".
         "--------------------------------<br>";
echo "Morphology :{$a[$three][0]}  <br> ".
         "Lattice: {$a[$three][1]} <br> ".
		 "Mineral name: {$a[$three][2]} <br> ".
		 "Structure name: {$a[$three][3]} <br> ".
		 "Conventional name: {$a[$three][4]} <br> ".
		 "Abbreviated name: {$a[$three][5]} <br> ".
		 "Elements contained: {$a[$three][6]} <br> ".
		 " Estimated field of view(angstrom): {$a[$three][7]} <br> ".
		 "Imaging technique: {$a[$three][8]} <br> ".
		 "Orientation: {$a[$three][9]} <br> ".
		 "ID: {$a[$three][10]} <br> ".
         "--------------------------------<br>";

?>
<h2>TEM image examples</h2>
<!--<img border="0" src="/atomsegmentation_bupt_fullsuite_2/circularMask/00001.png" alt="example" width="304" height="228">-->


<div class="row">
<div class="divcss5"> 
<img src="/atomsegmentation_bupt_fullsuite_2/image/<?php echo $a[$one][10] ?>.png" /> 
</div>    
<div class="divcss5"> 
<img src="/atomsegmentation_bupt_fullsuite_2/image/<?php echo $a[$two][10] ?>.png" /> 
</div>
<div class="divcss5"> 
<img src="/atomsegmentation_bupt_fullsuite_2/image/<?php echo $a[$three][10] ?>.png" /> 
</div>
</div>
<form action="download.php" method="post">
  <button name="subject" type="submit" value=''>downloaad</button>
</form>
</body>
</html>