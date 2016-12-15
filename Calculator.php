<!-- 
Author: 		Pronoxin
Filename:		Calculator.php
Description:	A simple PHP calculator
Creation:		14/12/2016
-->

<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
Number 1:<input name="Number1" type="text"><br>
Operator, use +,-,/ or *:<input name="Operator" type="text" size=1><br>
Number 2: <input name="Number2" type="text"><br>
<input name="send" type="submit" value="Send!">
</form>

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
		for($x=1; $x<=$second; $x++){
			echo " $first x $x = " .$x * $first." <br>";
		}
	}
	if($operator!="+" && $operator!="-" && $operator!="*" && $operator!="/"){
		echo "<script type='text/javascript'>alert('please enter a valid operator');</script>";
		return false;
	}
}
//runs the function when the submit button is pressed
if(isset($_POST['send'])){
	calculator();
}
?>