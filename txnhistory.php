<!DOCTYPE html>
<html lang="en">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>txnhistory</title>
    
    <link rel="stylesheet"
        href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body>
<header>
    <div class="navbar fixed-top navbar-dark bg-dark">
      
      <img src="banksymbol.png" alt="" width="50" height="50" class="mx-3 d-inline-block align-top">
      <a class="navbar-brand" href="#">Sparks Bank</a>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <h5>Txn History</h5>
        </li>
      </ul>
        <a class="navbar-brand" href="index.php">Home</a>
        <a class="navbar-brand" href="customer.php">All Users</a>
  </div>
  </header>

    <a class="navbar-brand" href="index.php">Home</a>
            <a class="navbar-brand" href="customer.php">All Users</a>

    <div class="jumbotron jumbotron-fluid">
            <h1 class="display-2 text-center">All Transactions !!</h1>
            <hr/>
    </div>

    <div class="container" >
        <div class="table-responsive" >
            <table class="table table-hover table-striped table-bordered">
            <caption>List of txns</caption>
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">S.No.</th>
                        <th class="text-center">Sender</th>
                        <th class="text-center">Receiver</th>
                        <th class="text-center">Amount</th>
                        <th class="text-center">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    include 'connect.php';
                    $sql = "SELECT * from txnn";
                    $query = mysqli_query($conn, $sql);
                    while ($rows = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td class="center py-2"><?php echo $rows['id']; ?></td>
                            <td class="center py-2"><?php echo $rows['sender']; ?></td>
                            <td class="center py-2"><?php echo $rows['receiver']; ?></td>
                            <td class="center py-2"><?php echo $rows['amount']; ?> </td>
                            <td class="center py-2"><?php echo $rows['date']; ?> </td>

                        <?php
                    }
                    mysqli_close($conn);
                        ?>
                </tbody>
            </table>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>