<!DOCTYPE html>
<!-- 
Author: Pronoxin
Filename: Calculator.php
Description: A simple PHP calculator
Creation: 14/12/2016

Updated: 19/03/2017
Reason: Finished first protoype, keypad and text work although keypad could be more efficent
-->
<head>
	<meta charset="utf-8">
	<link href="style.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
	<script>
	var string1 = "";
	var string2 = "";
	var finalnum = "";
	var operator = "";
	var operators = ['+','-','*','/'];
	
	function visability(x){
		if (x==1){
			document.getElementById("text").style.display="none";
			document.getElementById("Vclick").style.display="none";
			document.getElementById("key").style.display="block";
			document.getElementById("Vtext").style.display="block";
			return;
		}
		if (x==2){
			document.getElementById("key").style.display="none";
			document.getElementById("Vtext").style.display="none";
			document.getElementById("text").style.display="block";
			document.getElementById("Vclick").style.display="block";
			return;
		}
		else{
			alert("error")
			return;
		}
	}
	
	function addnumber(num){
		if (operator==""){
			string1 = string1 + num;
			document.getElementById("screen").innerHTML = string1;
		}
		if (operator!="") {
			string2 = string2 + num;
			alert(string2)
			document.getElementById("screen").innerhtml = string2;
		}
		return string1, string2;
	}
	
	function defineoperator(opp){
		if (opp=="+"){
			operator = operators[0];
		}
		if (opp=="-"){
			operator = operators[1];
		}
		if (opp=="*"){
			operator = operators[2];
		}
		if (opp=="/"){
			operator = operators[3];
		}
		document.getElementById("screen").innerHTML = operator;
		return operator;
		
	}
	
	function clearx(){
		number1 = 0;
		number2 = 0;
		string1 = "";
		string2 = "";
		operator = "";
		document.getElementById("screen").innerHTML = "";
		return number1, number2, string1, string2, operator;
	}
	
	function KeyCalculate(){
		var number1 = parseInt(string1);
		var number2 = parseInt(string2);
		
		if (operator=="+"){
			finalnum = eval("number1 + number2");
			document.getElementById("screen").innerHTML = finalnum;
		}
		if (operator=="-"){
			finalnum = eval("number1 - number2");
			document.getElementById("screen").innerHTML = finalnum;
		}
		if (operator=="*"){
			finalnum = eval("number1 * number2");
			document.getElementById("screen").innerHTML = finalnum;
		}
		if (operator=="/"){
			finalnum = eval("number1 / number2");
			document.getElementById("screen").innerHTML = finalnum;
		}
		return;
	}
	

	</script>
</head>

<body id="calculator" onload="visability(2)">
	<form action="http://google.com">
		<input type="submit" value="Go to Google" />
	</form>
	<button onclick="visability(1)" class="formatting" id="Vclick">Change format</button>
	<button onclick="visability(2)" class="formatting" id="Vtext">Change format</button>
	<form name="Keypad" id="key" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<table id="keypad" cellpadding="5" cellspacing="3">
	<div class="screen" id="screen"></div>
	<tr>
    	<td onclick="addnumber(1)">1</td>
        <td onclick="addnumber(2)">2</td>
        <td onclick="addnumber(3)">3</td>
		<td onclick="defineoperator('+')" class="redside">+</td>
    </tr>
    <tr>
    	<td onclick="addnumber(4)">4</td>
        <td onclick="addnumber(5)">5</td>
        <td onclick="addnumber(6)" >6</td>
		<td onclick="defineoperator('-')" class="redside">-</td>
    </tr>
    <tr>
    	<td onclick="addnumber(7)">7</td>
        <td onclick="addnumber(8)">8</td>
        <td onclick="addnumber(9)">9</td>
		<td onclick="defineoperator('*')" class="redside">*</td>
    </tr>
    <tr>
    	<td>#</td>
        <td onclick="addnumber(0)">0</td>
        <td onclick="clearx()" class="redside">C</td>
		<td onclick="defineoperator('/')" class="redside">/</td>
    </tr>
	</table>
	<input class="calculate" name="sendC" type="button" value="Calculate" onclick="KeyCalculate()">
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
	if ($second==""){
		echo "<script type='text/javascript'>alert('please enter the second number');</script>";
		return false;
	}	
	if($operator==""){
		echo "<script type='text/javascript'>alert('please enter an operator');</script>";
		return false;
	}	
	if($operator!="+" && $operator!="-" && $operator!="*" && $operator!="/"){
		echo "<script type='text/javascript'>alert('please enter a valid operator');</script>";
		return false;
	}
	if($operator=="+"){
		echo "$first + $second = ".$first + $second. " <br>";
	}
	if($operator=="-"){
		echo "$first - $second = " .$first - $second. " <br>";
	}
	if($operator=="/"){
		echo "$first / $second = " .$first / $second. " <br>";
	}
	if($operator=="*"){
		echo $first * $second , "<br>";
		for($x=1; $x<=$second; $x++){
			echo " $x x $first = " .$first * $x." <br>";
		}
	}
	
}
//runs the function when the submit button is pressed
if(isset($_POST['sendT'])){
	calculator();
}

?>