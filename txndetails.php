<?php
include './connect.php';

if (isset($_POST['submit'])) {

    $from = $_GET['id'];
    $to = $_POST['receiver'];
    $amount = $_POST['amount'];

    $sqlsender = "SELECT * from dummyusers where id=$from";
    $query1 = mysqli_query($conn, $sqlsender);
    $sql1 = mysqli_fetch_assoc($query1); 

    $sqlreceiver = "SELECT * from dummyusers where id=$to";
    $query2 = mysqli_query($conn, $sqlreceiver);
    $sql2 = mysqli_fetch_assoc($query2);

    if (($amount) <= 0) {
        echo '<script>';
        echo 'swal("Txn Not possible!", "payment must be atleast rupee 1 !", "warning")';  
        echo '</script>';
    }
    else if ($amount > $sql1['balance']) {
        echo '<script>';
        echo ' swal("Txn Not possible!", "Amount Too low !!", "warning");';  
        echo '</script>';
    }
    else {

        $sender = $sql1['name'];
        $receiver = $sql2['name'];

        $newbalance = $sql1['balance'] - $amount;
        $sql = "UPDATE dummyusers set balance=$newbalance where id=$from";
        mysqli_query($conn, $sql);

        $newbalance = $sql2['balance'] + $amount;
        $sql = "UPDATE dummyusers set balance=$newbalance where id=$to";
        mysqli_query($conn, $sql);

        $sql="INSERT INTO `txnn` (`sender`, `receiver`, `amount`, `date`) VALUES ('$sender','$receiver' , '$amount', CURRENT_TIMESTAMP);";
        $query = mysqli_query($conn, $sql);

        if ($query) {
            echo '<script>';
            echo ' swal("SUCCESS!", "Transaction successful  !!", "success");'; 
            echo '</script>';
        }
    }
}
?>