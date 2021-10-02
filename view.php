<!DOCTYPE html>
<html>
<head>
	<title>Cropping Image using JCROP</title>
  	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Images Table</h1>
	<div class="col-md-8 col-md-offset-2">
		<div class="row">
			<div class="col-md-12">
				<a href="index.php" class="btn btn-primary pull-right">Home</a>
			</div>
		</div><br>
		<table class="table table-bordered table-striped">
			<thead>
				<th>Image</th>
				<th>Location</th>
				<th>Date Added</th>
			</thead>
			<tbody>
				<?php 
					$conn = new mysqli('localhost', 'root', '', 'crop');

					$sql="select * from images order by imageid desc";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td><a href="<?php echo $row['location']; ?>"><img src="<?php echo $row['location']; ?>" width="30px" height="30px" class="thumbnail"></td>
							<td><?php echo $row['location']; ?></td>
							<td><?php echo date('M d, Y h:i A', strtotime($row['date_added'])); ?></td>
						</tr>
						<?php
					}
				?>
			</tbody>
		</table>
	</div>
</div>
</body>
</html>