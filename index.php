<?php

class Interview
{
	// variable couldn't be accessed unless declared as static
	public static $title = 'Interview test';
}
$lipsum = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus incidunt, quasi aliquid, quod officia commodi magni eum? Provident, sed necessitatibus perferendis nisi illum quos, incidunt sit tempora quasi, pariatur natus.';
$people = array(
	array('id'=>1, 'first_name'=>'John', 'last_name'=>'Smith', 'email'=>'john.smith@hotmail.com'),
	array('id'=>2, 'first_name'=>'Paul', 'last_name'=>'Allen', 'email'=>'paul.allen@microsoft.com'),
	array('id'=>3, 'first_name'=>'James', 'last_name'=>'Johnston', 'email'=>'james.johnston@gmail.com'),
	array('id'=>4, 'first_name'=>'Steve', 'last_name'=>'Buscemi', 'email'=>'steve.buscemi@yahoo.com'),
	array('id'=>5, 'first_name'=>'Doug', 'last_name'=>'Simons', 'email'=>'doug.simons@hotmail.com')
);
//making sure the data for person is given before assigning it to a variable
if(isset($_GET['person'])) {
	$person = $_GET['person'];
} else {
	$person = null;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interview test</title>
	<style>
	body {font: normal 14px/1.5 sans-serif;}
</style>
</head>
<body>

	<h1><?=Interview::$title;?></h1>

	<?php
	// loop for set to increment from 10 to 0 which made it finish immediately, I could have gone for decrementation(i-- and i>0) but incrementation seems more intuitive here.
	// Print 10 times
	for ($i=0; $i<10; $i++) {
		echo '<p>'.$lipsum.'</p>';
	}
	?>


	<hr>


	<form method="get" action="<?=$_SERVER['REQUEST_URI'];?>">
		<p><label for="firstName">First name</label> <input type="text" name="person[first_name]" id="firstName"></p>
		<p><label for="lastName">Last name</label> <input type="text" name="person[last_name]" id="lastName"></p>
		<p><label for="email">Email</label> <input type="text" name="person[email]" id="email"></p>
		<p><input type="submit" value="Submit" /></p>
	</form>

	<?php if ($person): ?>
		<!-- made sure that $person is either defined or null on lines 16 to 22-->
		<p><strong>Person</strong> <?=$person['first_name'];?>, <?=$person['last_name'];?>, <?=$person['email'];?></p>
	<?php endif; ?>


	<hr>


	<table>
		<thead>
			<tr>
				<th>First name</th>
				<th>Last name</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<!-- fixed the way to access each array's information-->
			<?php foreach ($people as $person): ?>
				<tr>
					<td><?=$person['first_name'];?></td>
					<td><?=$person['last_name'];?></td>
					<td><?=$person['email'];?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

</body>
</html>
