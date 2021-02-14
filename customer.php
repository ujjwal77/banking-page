
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>indexphp</title>
    
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
          <h5>All Users</h5>
        </li>
      </ul>
      <a class="navbar-brand" href="index.php">Home</a>
    <a class="navbar-brand" href="txnhistory">Txn History</a>
  </div>
  </header>
    
    
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-2 text-center">Money Transfer Got Easy! Sparks Bank !!</h1>
            <hr class="my-2">
        </div>
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <caption>List of users</caption>
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" scope="col">User Id</th>
                        <th class="text-center" scope="col">Name</th>
                        <th class="text-center" scope="col">E-mail</th>
                        <th class="text-center" scope="col">Bank Balance</th>
                        <th class="text-center" scope="col">Transfer Money</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     include 'connect.php';
                     $sql = "SELECT * FROM dummyusers";
                     $result = mysqli_query($conn, $sql);
                     if (isset($result)) {
                        while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr class="table-light">
                                <td class="center py-2"><?php echo $rows['id']; ?></td>
                                <td class="center py-2"><?php echo $rows['name'] ; ?></td>
                                <td class="center py-2"><?php echo $rows['mail']; ?></td>
                                <td class="center py-2"><?php echo $rows['balance']; ?></td>
                                <td class="center"><a href="users.php?id=<?php echo $rows['id']; ?>"> <button type="button" class="btn ">Transfer</button></a></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js"></script>
</body>

</html>