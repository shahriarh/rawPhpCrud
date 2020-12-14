<?php 
include "inc/header.php"; 
include "config.php";
include "Database.php";
?>

<?php
	 $db    = new Database();
	 $query = "Select * from tbluser";
	 $read  = $db->select($query);
?>

<?php 
	if (isset($_GET['msg'])) {
		echo "<span style='color:green'>".$_GET['msg']."</span>";
	}
?>

<form action="create.php" method="post">
<table class="tblone">
	
<tr>
	<th width="25%">Name</th>
	<th width="25%">Email</th>
	<th width="25%">Skill</th>
	<th width="25%">Action</th>
</tr>

<?php if($read) {?>
<?php while($row = $read->fetch_assoc()) { ?>	
<tr>
	<td><?php echo $row['name']; ?></td>
	<td><?php echo $row['email']; ?></td>
	<td><?php echo $row['skill']; ?></td>
	
	<td><a href="update.php?id=<?php echo urlencode($row['id']);?>">Edit</a></td>
</tr>

<?php  }?>
<?php  }else{?>
<p>Data not available!!</p>
<?php }?>

</table>
</form>
<a href="create.php">Create</a>

<?php include "inc/footer.php"; ?>