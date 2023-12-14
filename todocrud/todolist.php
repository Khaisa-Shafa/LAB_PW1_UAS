<?php
include("../Config/db.php");
session_start(); // Start the session

if(isset($username)) {
    $_SESSION['username'] = $username; // Set the username in a session variable
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To-Do List Mantap</title>
<<<<<<< HEAD
    <link rel="stylesheet" href="style.css">
=======
    <link rel="stylesheet" href="../style.css">
>>>>>>> 8f99856f3d7809f6638efc925180ae39a4e292ee
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <style>
        * {
            margin: 0;
            padding: 0;
            }

            body {
            font-family: 'Rokkitt', serif;
            background-color: var(--bg);
            color: #010101;
            }

            /* NAVBAR */
            .navbar {
            background-color: #add8e6;
            margin-top: 0px;
            }
            .navbar-brand {
            font-weight: 600;
            }

            .user img{
            width: 100%;
            height: 30px;
            margin-left: 10px;
            padding-right: 25px;
            padding-top: 8px;
            }

        .user img {
            width: 100%;
            height: 30px;
            margin-left: 10px;
            padding-right: 25px;
            padding-top: 8px;
        }
    </style>
    <nav class="position-fixed z-1 start-0 end-0 navbar navbar-expand-lg">
        <div class="container-fluid">
        <a class="navbar-brand" href="../index.html">TO DO LIST</a>
        <button id="themeToggle">Toggle Dark Mode</button>
        </div>
        <div class="user">
            <a href="../Akun/masuk.php"><img src="../Styling/user.png" alt="user"></a>
        </div>
    </nav>

    <?php
    $sql = "SELECT * FROM todo";
    if ($stmt = $conn->prepare($sql)) {
        $i = 0;
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $i++;         
            echo '<div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title" name>'. $row["task"]. '</h5>
                            <p class="card-text"> Deadline : '. $row["deadline"] . '</p>
                            <form method="post" action="delete.php">
                                <input type="hidden" name="delete_id" value="' . $row["id"] . '">
                                <input class="donebutton" type="submit" name="delete" value="Done">
                            </form>
                        </div>
                    </div>
                </div>';
        }
        echo $i . " results";
    } else
        echo "<tr><td colspan='4'>0 results</td></tr>";
    $stmt->close();
    ?>
    <table>
        <tr>
            <td colspan='4'>
                <form method='post' action='add.php' class='addform'>
                    <input type="text" name="task" placeholder="Task" required>
                    <input type="date" name="deadline" placeholder="Deadline">
                    <input type="submit" name="add" value="Tambah Task">
                </form>
            </td>
        </tr>
    </table>
    <script src = "../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

<?php
$conn->close();
?>