<?php include 'inc/header.php'; ?>

<?php
	
	$db = new Database();
	if (isset($_POST['submit'])) {
		
		$name = mysqli_real_escape_string($db->link, $_POST['name']);
		$email = mysqli_real_escape_string($db->link, $_POST['email']);
		$skill = mysqli_real_escape_string($db->link, $_POST['skill']);
		if (empty($name) || empty($email) || empty($skill) ) {
			$error = "Field mustnot be empty";
		}else{
			$query = "INSERT INTO users(name, email, skill)VALUES('$name',
						'$email', '$skill')";
						$insert = $db->insert($query);
		}
	}
	

?>

<?php 
	
	if (isset($error)) {
		echo "<span style='color:red;'>". $error."</span>";
	}

?>

<form action="" method="post">
<table>
	<tr>
		<td>Name</td>
		<td><input type="text" name="name" placeholder="Please enter your name"></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><input type="text" name="email" placeholder="Please enter your email"></td>
	</tr>
	<tr>
		<td>Skill</td>
		<td><input type="text" name="skill" placeholder="Please enter your skill"></td>
	</tr>
	<tr>
		<td></td>
		<td>
			<input type="submit" name="submit" value="Save">
			<input type="reset" value="Reset">
		</td>
	</tr>
</table>
 </form>
 <a href="index.php">Go Back</a>
<?php include 'inc/footer.php'; ?>