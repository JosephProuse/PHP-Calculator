<!DOCTYPE html>

<!-- 
Author: Pronoxin
Filename: Calculator.php
Description: A simple PHP calculator
Creation: 14/12/2016

Updated: 04/01/2017
Reason: Started adding a keypad as another form to the program
-->

<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet">
	<script>
	function visability(x){
		if (x==1){
			document.getElementById("text").style.display="none";
			document.getElementById("Vclick").style.display="none";
			document.getElementById("click").style.display="block";
			document.getElementById("Vtext").style.display="block";
		}
		if (x==2){
			document.getElementById("click").style.display="none";
			document.getElementById("Vtext").style.display="none";
			document.getElementById("text").style.display="block";
			document.getElementById("Vclick").style.display="block";
		}
			
	}
	</script>
</head>

<body id="calculator" onload="visability(2)">
	<button onclick="visability(1)" class="formatting" id="Vclick">Change format</button>
	<button onclick="visability(2)" class="formatting" id="Vtext">Change format</button>
	<form id="click" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<table id="keypad" cellpadding="5" cellspacing="3">
	<tr>
    	<td onclick="addCode('1');">1</td>
        <td onclick="addCode('2');">2</td>
        <td onclick="addCode('3');">3</td>
    </tr>
    <tr>
    	<td onclick="addCode('4');">4</td>
        <td onclick="addCode('5');">5</td>
        <td onclick="addCode('6');">6</td>
    </tr>
    <tr>
    	<td onclick="addCode('7');">7</td>
        <td onclick="addCode('8');">8</td>
        <td onclick="addCode('9');">9</td>
    </tr>
    <tr>
    	<td>#</td>
        <td onclick="addCode('0');">0</td>
        <td onclick="clear()">C</td>
    </tr>
	</table>
	<input class="calculate" name="sendC" type="submit" value="Calculate">
	</form>
	<form id="text" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
	Number 1:<input name="Number1" type="text"><br>
	Operator, use +,-,/ or *:<input name="Operator" type="text" size=1><br>
	Number 2: <input name="Number2" type="text"><br>
	<input class="calculate" name="sendT" type="submit" value="Calculate">
	</form>
</body>

<?php
// delcares the function calculator
function calculator(){ 
	$operator = $_POST['Operator'];
	$first = $_POST['Number1'];
	$second = $_POST['Number2'];
	
	if($first==""){
		echo "<script type='text/javascript'>alert('please enter the first number');</script>";
		return false;
	}
	if($operator==""){
		echo "<script type='text/javascript'>alert('please enter an operator');</script>";
		return false;
	}
	if ($second==""){
		echo "<script type='text/javascript'>alert('please enter the second number');</script>";
		return false;
	}
	if($operator=="+"){
		echo "$first + $second = ".$first + $second. " <br>";
	}
	if($operator=="-"){
		echo " $first - $second = " .$first - $second. " <br>";
	}
	if($operator=="/"){
		echo " $first / $second = " .$first / $second. " <br>";
	}
	if($operator=="*"){
		echo $first * $second , "<br>";
		for($x=1; $x<=$second; $x++){
			echo " $first x $x = " .$first * $x." <br>";
		}
	}
	if($operator!="+" && $operator!="-" && $operator!="*" && $operator!="/"){
		echo "<script type='text/javascript'>alert('please enter a valid operator');</script>";
		return false;
	}
}
//runs the function when the submit button is pressed
if(isset($_POST['sendT'])){
	calculator();
}
?>