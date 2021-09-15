<?php


$connect = new PDO("mysql:host=localhost;dbname=customer", "root", "");
$query = "SELECT * FROM customerdb ORDER BY customer_id";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
?>



<!DOCTYPE html>
<html>
	<head>
		<title>Send Bulk Email</title>
    	<link rel="stylesheet" href="css/mycss.css">
		<link rel="stylesheet" href="css/navigations.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>

		ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: rgb(24, 5, 5);
}

li {
  float: right;
}

li a {
  display: block;
  color: white;
  text-align: right;
  padding: 14px 16px;
  text-decoration: none;
  text-align: center;
}

/* Change the link color to #111 (black) on hover */
li a:hover {
  background-color: #111;
}
</style>
	</head>

	<header>
  <ul>
  
  	<li><a href="draft.html">Drafts</a></li>
      <li><a href="email.html"><strike>Inbox</strike></a></li>
      <li><a href="b_email.php">Bulk</a></li>
      <li><a href="search-form.php">Search</a></li>
      <li><a href="email.html"><strike>Sent</strike></a></li>
      <li><a href="email.php">EMAIL</a></li>
	  <li><a href="homepage.php"> Homepage</a></li> 
      

    
  </ul>
  
</header>
	<body class="bg03">
		<br />
		<div class="body">
			<h3 style="color:white;" align="center">Send Bulk Email</h3>
			<br />

      <br />
	  <div class="bg04">
			<div class="table-responsive" >
				<table class="table table-bordered table-striped">
					<tr>
						<th>Customer Name</th>
						<th>Email</th>
						<th>Select</th>
						<th>Action</th>
					</tr>
				<?php
				$count = 0;
				foreach($result as $row)
				{
					$count = $count + 1;
					echo '
					<tr>
						<td>'.$row["customer_name"].'</td>
						<td>'.$row["customer_email"].'</td>
						<td>
							<input type="checkbox" name="single_select" class="single_select" data-email="'.$row["customer_email"].'" data-name="'.$row["customer_name"].'" />
						</td>
						<td>
						<button type="button" name="email_button" class="btn btn-info btn-xs email_button" id="'.$count.'" data-email="'.$row["customer_email"].'" data-name="'.$row["customer_name"].'" data-action="single">Send Single</button>
						</td>
					</tr>
					';
				}
				?>
					<tr>
						<td colspan="3"></td>
						<td><button type="button" name="bulk_email" class="btn btn-info email_button" id="bulk_email" data-action="bulk">Send Bulk</button></td></td>
					</tr>
				</table>
			</div>
		</div>
		</div>
	</body>
</html>

<script>
$(document).ready(function(){
	$('.email_button').click(function(){
		$(this).attr('disabled', 'disabled');
		var id  = $(this).attr("id");
		var action = $(this).data("action");
		var email_data = [];
		if(action == 'single')
		{
			email_data.push({
				email: $(this).data("email"),
				name: $(this).data("name")
			});
		}
		else
		{
			$('.single_select').each(function(){
				if($(this).prop("checked") == true)
				{
					email_data.push({
						email: $(this).data("email"),
						name: $(this).data('name')
					});
				} 
			});
		}

		$.ajax({
			url:"send_mail.php",
			method:"POST",
			data:{email_data:email_data},
			beforeSend:function(){
				$('#'+id).html('Sending...');
				$('#'+id).addClass('btn-danger');
			},
			success:function(data){
				if(data == 'ok')
				{
					$('#'+id).text('Success');
					$('#'+id).removeClass('btn-danger');
					$('#'+id).removeClass('btn-info');
					$('#'+id).addClass('btn-success');
				}
				else
				{
					$('#'+id).text(data);
				}
				$('#'+id).attr('disabled', false);
			}
		})

	});
});
</script>





