<?php 
include("../Config/db.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['task'], $_POST['deadline'],$_SESSION['username'] )) {
    $task = $_POST['task'];
    $deadline = $_POST['deadline'];
    
    if (!empty($task) && !empty($deadline)) {
    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        
        $insert_query = "INSERT INTO todo (task, deadline, username) VALUES (?, ?, ?)";
        
        // Prepare and bind the statement
        if ($stmt = $conn->prepare($insert_query)) {
            $stmt->bind_param("sss", $task, $deadline, $username);
            
            if ($stmt->execute()) {
                header("Location: todolist.php");
                exit();
            } else {
                echo "Error: " . $conn->error;
            }
            
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }
    else {
        echo "Error: Task or deadline cannot be empty.";
    }
    } else {
        echo "Error: Session username not found.";
    }
}
?>
