<!DOCTYPE html>
<html lang="en">
<head>

  <title>Agent Table</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

  <?php



funtion insertAgentTable($mysqli){
  echo '
  <div>
  	<form method="POST">
  		<h2>Add New Agent</h2>

      <label for="id">Enter Agent ID</label>
  		<input type="text" required maxlength="20" name="id">

  		<label for="name">Name</label>
  		<input type="text" required maxlength="20" name="aname">

      <label for="aname">Working Area</label>
  		<input type="text" required maxlength="20" name="aworking_area">

      <label for="aname">Commission Rate</label>
  		<input type="number" required name="acommission">

      <label for="aname">Phone Number</label>
  		<input type="tel" required name="aphone_number">

      <label for="agent_country">Country</label>
  		<input type="text" required maxlength="20" name="agent_country">

  		<button type="submit" value="Submit">
  	</form>
  </div>
  '

  if (isset($_POST['aname'])) {
      $id = $_POST['id'];
      $aname = $_POST['aname'];
      $aworking_area = $_POST['aworking_area'];
      $acommission = $_POST['acommission'];
      $aphone_number = $_POST['aphone_number'];
      $agent_country = $_POST['agent_country'];

      $sql = "insert into AGENTS (id, aname, aworking_area, acommission,aphone_number, agent_country) values (?,?,?,?,?,?)";
      
      $sta = mysqli_prepare($mysqli, $sql);
      echo $mysqli->error;
      mysqli_stmt_bind_param($sta, 'isssss', $id, $aname, $aworking_area, $acommission, $aphone_number, $agent_country);
      echo $mysqli->error;
      $sta->execute();
   echo $mysqli->error;
   echo $sta;
   }
}


  $db_host = 'localhost';
  $db_user = 'root';
  $db_password = 'root';
  $db_db = 'FinalExam';
  $db_port = 8889;

  $mysqli = new mysqli(
  $db_host,
  $db_user,
  $db_password,
  $db_db
);

if ($mysqli->connect_error)
{
  echo 'Error: '.$mysqli->connect_error;
  echo '<br>';
  echo 'Error: '.$mysqli->connect_error;
  exit();
}

echo 'Success: A proper connection to MySQL was made.';

echo '<br>';

echo 'Host information: '.$mysqli->host_info;

echo '<br>';

echo 'Protocol version: '.$mysqli->protocol_version;

insertAgent($mysqli);

echo'<h2>Present Agents</h2>';

$sql = "SELECT AGENT_NAME FROM AGENTS";
$result = $mysqli->query($sql);

if ($result->num_rows > 0)
{
  
  while($row = $result->fetch_assoc())
  {
    echo "Name: " . $row["AGENT_NAME"];
  }
}
else
{
  echo "0 results";
}

   ?>

</body>
</html>
