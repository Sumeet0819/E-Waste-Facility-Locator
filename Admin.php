<?php
include 'session.php';
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        </span>
                        <span class="title">E-Waste Locator</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Customers</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="help-outline"></ion-icon>
                        </span>
                        <span class="title">Help</span>
                    </a>
                </li>
        
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="lock-closed-outline"></ion-icon>
                        </span>
                        <span class="title">Password</span>
                    </a>
                </li>

                <li>
                    <a href="pages-signout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
            </div>

            <!-- ======================= Cards ================== -->
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">1,504</div>
                        <div class="cardName">Daily Views</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">80</div>
                        <div class="cardName">Sales</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cart-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">284</div>
                        <div class="cardName">Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="numbers">$7,842</div>
                        <div class="cardName">Earning</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>
       <div>  <?php
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
        <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Users</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Approve</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
            <?php
                while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['Name']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo "<a href=Admin.php?editid=$row[id] class='btn'style='text-decoration:none;  padding: 5px 10px; background: #1795ce; color: var(--white);border-radius: 4px;font-size: 14px; font-weight: 500;'>Approve </a>";?></td>
                <td><?php echo "<a href=Admin.php?delid=$row[id] class='btn' style='text-decoration:none;  padding: 5px 10px; background: #8de02c;color: var(--white);border-radius: 4px; font-size: 14px;font-weight: 500;'>Delete</a>";?></td>
            </tr>
            <?php
                }
            ?>
                                </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        <?php
            if (isset($_GET['editid'])) {
                $select = "UPDATE user SET Status='approved' WHERE id = '$_GET[editid]'";
                $res = mysqli_query($conn, $select);

                if (mysqli_affected_rows($conn) == 1) {
                    echo "<script>alert(' Request Approved successfully..');</script>";
                    echo "<script>window.location='Admin.php'</script>";
                }
            }

            if (isset($_GET['delid'])) {
                $sql = "DELETE FROM user WHERE id='$_GET[delid]'";
                $qsql = mysqli_query($conn, $sql);

                if (mysqli_affected_rows($conn) == 1) {
                    echo "<script>alert('appointment record deleted successfully..');</script>";
                    echo "<script>window.location='Admin.php'</script>";
                }
            }
        ?></div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/admin.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>