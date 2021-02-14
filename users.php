<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>usersphp</title>

    <link rel="stylesheet"
        href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
          <h5>Transfer</h5>
        </li>
      </ul>
        <a class="navbar-brand" href="index.php">Home</a>
        <a class="navbar-brand" href="customer.php">All Users</a>
  </div>
  </header>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-2 text-center">just a few steps away!!</h1>
            <hr class="my-2">
        </div>
        <div class="text-center">
        <a class= "btn btn-primary btn-lg" href="txnhistory.php" role="button">Txn History</a>
        </div>
    </div>

    <div class="container-fluid">

        <?php
        include 'connect.php';
        if (isset($_REQUEST['id'])) {
            $userid = $_GET['id'];
            $sql = "SELECT * FROM  dummyusers where id=$userid";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo "Error : " . $sql . "<br>" . mysqli_error($conn);
            }
            $rows = mysqli_fetch_assoc($result);
        }
        ?>
        <div class="container-fluid">
            <table class="table table-sm table-striped table-condensed table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">User Id</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">E-mail</th>
                        <th class="text-center">Bank Balance</th>
                    </tr>
                </thead>
                <tr>
                    <td class="center py-2"><?php echo $rows['id']; ?></td>
                    <td class="center py-2"><?php echo $rows['name'] ; ?></td>
                    <td class="center py-2"><?php echo $rows['mail']; ?></td>
                    <td class="center py-2"><?php echo $rows['balance']; ?></td>
                </tr>
            </table>
        </div>

        <br>
        <form method="post">
            <div class="container">
            <label>TRANSFER</label>
            <div class="input-group mb-3">
                
                <select id="receiver" name="receiver" class="form-control" required>
                    <option value="" disabled selected>SELECT</option>
                    <?php
                        include 'connect.php';
                        $userid = $_GET['id'];
                        $sql = "SELECT * FROM dummyusers where id!=$userid";
                        $result = mysqli_query($conn, $sql);
                        if (!$result) {
                            echo "Error " . $sql . "<br>" . mysqli_error($conn);
                        }
                        while ($rows = mysqli_fetch_assoc($result)) {
                    ?>
                    <option class="form-select" multiple aria-label="multiple select example" value="<?php echo $rows['id']; ?>">
                        <?php echo $rows['name']; ?>
                         (Cur Bal:<?php echo $rows['balance']; ?> )
                    </option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <input type="number" name="amount" id="amount" class="form-control" placeholder=" Enter Amount">
            </div>
            <br />
            <div class="text-center">
                <button name="submit" class="btn btn-success">Send</button>
            </div>
            </div>

        </form>

    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
include 'txndetails.php';
?>