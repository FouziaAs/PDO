<?php
require_once "connect.php";

$pdo = new \PDO(DSN, USER, PASS);

$query = "SELECT * FROM friend";
$statement = $pdo->query($query);
$friends = $statement->fetchAll();

$firstname = trim($_POST['firstname']);
$lastname = trim($_POST['lastname']);
$query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';
$statement = $pdo->prepare($query);
$statement->bindValue(':firstname', $firstname, \PDO::PARAM_INT);
$statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);

$statement->execute();
$friends = $statement->fetchAll();

?>

<ul>
    <?php
    foreach ($friends as $friend) {
        echo '<li>' . $friend['firstname'] . ' ' . $friend['lastname'] . '</li>';
    }
    ?>
</ul>
<form action="" method="post"
    <div>
    <label  for="firstname">firstname :</label>
    <input  type="text"  id="firstname"  name="firstname">
    </div>
    <div>
    <label  for="lasttname">lastname :</label>
    <input  type="text"  id="lastname"  name="lastname">
    </div> 
    <div class= "button">
        <button type="submit"> Send </button>
</div>
</form>
</body>
</html>