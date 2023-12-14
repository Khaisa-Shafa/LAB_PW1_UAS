<?php 
include("../Config/db.php");

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['task'], $_POST['deadline'])) {
    $task = $_POST['task'] ?? '';
    $deadline = $_POST['deadline'] ?? '';

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        
        $insert_query = "INSERT INTO todo (task, deadline) VALUES (?, ?)";
        
        // Prepare and bind the statement
        if ($stmt = $conn->prepare($insert_query)) {
            $stmt->bind_param("ss", $task, $deadline);
            
            if ($stmt->execute()) {
                echo "Task berhasil ditambah!";
                header("Location: todolist.php");
                exit();
            } else {
                echo "Error: " . $conn->error;
            }
            
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Error: Session username not found.";
    }
}
?>
