<?php include 'inc/header.php'; ?>

<?php
	
	$db = new Database();
	$query = 'SELECT * FROM users ORDER BY id DESC';
	$read = $db->select($query);

?>
<?php 
	
	if (isset($_GET['msg'])) {
		echo "<span style='color:green;'>". $_GET['msg']."</span>";
	}

?>

<table class="tblone">
	<tr>
		<th width="10%">id</th>
		<th width="25%">Name</th>
		<th width="25%">Email</th>
		<th width="25%">Skill</th>
		<th width="15%">Action</th>
	</tr>
	<?php if ($read) { $i=0;
		?>
	<?php while ($row = $read->fetch_assoc()) { 
		$i++;?>
	<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['name']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['skill']; ?></td>
		<td><a href="update.php?id=<?php echo $row['id']; ?>">Edit</a></td>
	</tr>
<?php }?>
<?php } else{?>?>
 
<p>Data not available....!</p>
	<?php }?>
</table>
<a href="create.php">Create</a>
 
<?php include 'inc/footer.php'; ?>