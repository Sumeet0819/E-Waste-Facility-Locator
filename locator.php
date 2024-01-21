<?php 
    include 'connection.php';
?>
<html>

<head>
    <title>e-waste loctor</title>
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/locator.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>
        <main>
            <span>
                <h1>Recycling Centers</h1>
                <div class="view-assignment">
                    <div class="middel">

                        <table class="table table-bordered admin_table">
                            <tr>
                                <th>Sr_no.</th>
                                <th>State</th>
                                <th>Complete_address</th>
                                <th>Contact_person</th>
                                <th>Contact_no</th>
                            </tr>

                            <?php 
                            
                        $query = "SELECT * FROM locator";
                        $result = mysqli_query($conn,$query);
                        while($row = mysqli_fetch_array($result)){
                    ?>
                            <tr>
                                <td><?php echo $row['Sr_no.'];?></td>
                                <td><?php echo $row['State'];?></td>
                                <td><?php echo $row['Complete_address'];?></td>
                                <td><?php echo $row['Contact_person'];?></td>
                                <td><?php echo $row['Contact_no'];?></td>
                            </tr>
                            <?php 
                        }
                    ?>
                        </table>
                    </div>
            </span>
        </main>
    </div>
</body>

</html>
