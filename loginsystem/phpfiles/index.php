<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<?php 
// $sn="Tum Prem Ho Reprise.m4a";
// echo '<button id="y" onclick="pl(\'$sn\')">click</button>';
?>
<?php
  $song = "Tum Prem Ho Reprise.m4a";
  echo "<button onclick='pl(\"$song\")'>Play Song</button>";
?>


 <body>


</body>
<script>
	let pl=(sn)=>{
		let a=new Audio(sn);
		a.play();
	}
	</script>
</html>
