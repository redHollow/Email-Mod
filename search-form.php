<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navigation.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/tooplate.css">
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
    <!-- (A) SEARCH FORM -->
    <form method="post" action="search-form.php">
      <h4>SEARCH FOR USERS</h4>
      <input type="text" name="search" required/>
      <input type="submit" value="Search"/>
    </form>

    <?php
    // (B) PROCESS SEARCH WHEN FORM SUBMITTED
    if (isset($_POST['search'])) {
      // (B1) SEARCH FOR USERS
      require "searchbend.php";
      
      // (B2) DISPLAY RESULTS
      if (count($results) > 0) {
        foreach ($results as $r) {
          printf("<div>%s - %s</div>", $r['customer_name'], $r['customer_email']);
        }
      } else { echo "No results found"; }
    }
    ?>
  </body>
</html>