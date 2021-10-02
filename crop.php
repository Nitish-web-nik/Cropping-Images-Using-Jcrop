<?php $filename = $_GET['file']; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cropping Image using JCROP</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="css/jquery.Jcrop.css" type="text/css" />
	
  <script type="text/javascript">
    $(function(){
      $('#cropbox').Jcrop({
        aspectRatio: 1,
        onSelect: updateCoords
      });
    });

    function updateCoords(c){
      $('#x').val(c.x);
      $('#y').val(c.y);
      $('#w').val(c.w);
      $('#h').val(c.h);
    };

    function checkCoords(){
      if (parseInt($('#w').val())) return true;
      alert('Please select a crop region then press submit.');
      return false;
    };

  </script>
</head>
<body>
<div class="container">
  <h1 class="page-header text-center">Cropping Image using JCROP</h1>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
  		<img src="upload/<?php echo $filename; ?>" id="cropbox">
  		<form action="save.php?file=<?php echo $filename; ?>" method="post" onsubmit="return checkCoords();">
  			<input type="hidden" id="x" name="x" />
  			<input type="hidden" id="y" name="y" />
  			<input type="hidden" id="w" name="w" />
  			<input type="hidden" id="h" name="h" />
        <br>
  			<input type="submit" value="Save Image" class="btn btn-primary btn-large btn-inverse">
        <br><br>
  		</form>
    </div>
  </div>
	
</div>
</body>

</html>
