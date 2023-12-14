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

    <div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <div class="card" >
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
    </div>
    <div class="carousel-item">
    <div class="card" >
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
    </div>
    <div class="carousel-item">
    <div class="card" >
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
    </div>
    <div class="carousel-item">
    <div class="card">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
    </div>
    <div class="carousel-item">
    <div class="card">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
</div>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
        <
    <script src = "../script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

<?php
$conn->close();
?>