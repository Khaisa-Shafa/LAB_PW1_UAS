<?php
include("../Config/db.php");
?>
<?php
include("../Config/db.php");

//NANTI NGAMBIL FITUR BAGI PER BULAN

// Fetch distinct months and years available in the database
$availableMonths = [];
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    $sql = "SELECT DISTINCT MONTH(tanggal) AS month, YEAR(tanggal) AS year
            FROM pesanan 
            WHERE username = ? 
            ORDER BY year DESC, month DESC"; // Order by year and month

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $monthYear = date("F Y", mktime(0, 0, 0, $row['month'], 1, $row['year']));
            $availableMonths[] = $monthYear;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../Styling/layanan.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt:ital,wght@0,100;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <!-- BUAT BOOTSTRAP NAVBAR-->

    <!-- section layanan -->
    <div>
    <div class="tabel">
            <table id="tabel1" style="width: 50%;">
                <tr>
                    <th>No.</th>
                    <th>Nama Tugas</th>
                    <th>Deadline</th>
                    <th></th>
                </tr>

                <?php                
                    $sql = "SELECT * FROM layanan WHERE username = ?";
                    if ($stmt = $conn->prepare($sql)) {
                        $stmt->bind_param("s", $username);
                        $stmt->execute();
                        $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $i = 0;
                    while ($row = $result->fetch_assoc()) {
                        $i++;
                        echo "<tr><td>" . $i . "</td><td>" . $row["namalayanan"] . "</td><td>" . $row["harga"] . "</td>";
                        echo "<td>";
                        echo "<form method='post' action='edit.php'>";
                        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                        echo "<input type='text' name='edited_namalayanan_" . $row['id'] . "' placeholder='Nama Layanan' required>";
                        echo "<input type='number' name='edited_harga_" . $row['id'] . "' placeholder='Harga' required>";
                        echo "<input type='submit' class='update' name='update' value='Update'>";
                        echo "</form>";
                        // Form for service deletion
                        
                        echo "<form method='post' action='delete.php'>";
                        echo "<input type='hidden' name='delete_id' value='" . $row['id'] . "'>";
                        echo "<input type='submit' class='delete' name='delete' value='Delete'>";
                        echo "</form>";
                    
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "<tr><td colspan='4'>" . $i . " results</td></tr>";
                } else {
                    echo "<tr><td colspan='4'>0 results</td></tr>";
                }
                $stmt->close();
            }else {
                echo "Error preparing statement" . $conn->error; 
            }
                ?>
                <tr>
                    <td colspan='4'>
                        <form method='post' action='add.php' class='addform'>
                            <input type="text" name="namalayanan" placeholder="Nama Layanan" required>
                            <input type="number" name="harga" placeholder="Harga" required>
                            <input type="submit" name="add" value="Tambah Layanan">
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>