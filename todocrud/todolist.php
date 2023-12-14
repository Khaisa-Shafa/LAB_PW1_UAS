<?php
include("../Config/db.php");
session_start();

if(isset($username)) {
    $_SESSION['username'] = $username;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To-Do List Mantap</title>
    <link rel="stylesheet" href="../style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <nav class="position-fixed z-1 start-0 end-0 navbar navbar-expand-lg">
        <div class="container-fluid">
        <a class="navbar-brand" href="../index.html">TO DO LIST</a>
        <button class="themeToggle">Toggle Dark Mode</button>
        </div>
        <div class="user">
            <a href="../Akun/masuk.php"><img src="../Styling/user.png" alt="user"></a>
        </div>
    </nav>

    <table class="tabel">
        <tr>
            <td colspan='4'>
                <form method='post' action='add.php' class='addform'>
                    <input type="text" name="task" placeholder="Task" required>
                    <input type="date" name="deadline" placeholder="Deadline">
                    <input type="submit" name="add" value="Tambah Task">
                </form>
            </td>
        </tr>
        <td class="all-card">
        </td>
    </table>

        <?php
            $sql = "SELECT * FROM todo";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->execute();
                $result = $stmt->get_result();
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                    $i++;
                echo'    <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">' . $row["task"].'</h5>
                                            <p class="card-text">Deadline: '. $row["deadline"] .' </p>
                                            <form method="post" action="delete.php">
                                                <input type="hidden" name="delete_id" value='. $row["id"].'>
                                                <input class="donebutton" type="submit" name="delete" value="Done">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                }
                $stmt->close();
            } else {
                echo "<tr><td colspan='4'>0 results</td></tr>";
            }
            ?>
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src = "../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

<?php
$conn->close();
?>