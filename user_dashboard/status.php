<html>
    <body>
        <?php
            if (!defined('DB_SERVER')) {
                define('DB_SERVER', 'localhost');
            }
            
            if (!defined('DB_USER')) {
                define('DB_USER', 'root');
            }
            
            if (!defined('DB_PASS')) {
                define('DB_PASS', '');
            }
            
            if (!defined('DB_NAME')) {
                define('DB_NAME', 'gec-project');
            }
            
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            
            $query = "SELECT * FROM user WHERE Status ='Pending'";
            $result = mysqli_query($conn, $query);
            ?>
    

        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
                <th>Delete</th>
            </tr>

            <?php
                while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo "<a href=index.php?editid=$row[id] class='btn btn-raised g-bg-cyan'>Approve </a>";?></td>
                <td><?php echo "<a href=index.php?delid=$row[id] class='btn' style='background: linear-gradient(to left, #df4e55,#d10035);'>Delete</a>";?></td>
            </tr>
            <?php
                }
            ?>
        </table>

        <?php
            if (isset($_GET['editid'])) {
                $select = "UPDATE user SET Status='approved' WHERE id = '$_GET[editid]'";
                $res = mysqli_query($conn, $select);

                if (mysqli_affected_rows($conn) == 1) {
                    echo "<script>alert('appointment record Approved successfully..');</script>";
                    echo "<script>window.location='index.php'</script>";
                }
            }

            if (isset($_GET['delid'])) {
                $sql = "DELETE FROM user WHERE id='$_GET[delid]'";
                $qsql = mysqli_query($conn, $sql);

                if (mysqli_affected_rows($conn) == 1) {
                    echo "<script>alert('appointment record deleted successfully..');</script>";
                    echo "<script>window.location='index.php'</script>";
                }
            }
        ?>

    </body>
</html>