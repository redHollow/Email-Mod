<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Email</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navigation.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/tooplate.css">
    <script type="text/javascript" src="sisyphus.js"></script>
    <script>
    $( function() {
      $( "form" ).sisyphus();
    } );
    </script>
    
    

  </head>

 <!-- Header Menu of the Page -->
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
    
<h2 style="color:white;">Send e-mail</h2>
<form action="" id="form2" name="form2" method="post">
Name:<br>
<input type="text" name="name"><br>
E-mail:<br>
<input type="text" name="mail"><br>
Message:<br>
<textarea class="form-control" id="textAreaExample6" rows="3"></textarea>
<input type="submit" value="Send">
<input type="reset" value="Reset">
</body>
</html>