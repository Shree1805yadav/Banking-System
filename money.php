<?php 
$localhost = "localhost"; #localhost
$dbusername = "root"; #username of phpmyadmin
$dbpassword = "";  #password of phpmyadmin
$dbname = "bank"; 

 
#connection string
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);

/*if($conn-> connect_error){
    die("connect failed" . $conn-> connect_error);

} 
echo "connected successfully";*/
if (isset($_POST["upload"]))
 {
     #retrieve file title
       
        $pers_f_acc  = $_POST["ac_no"];
        $pers_a_balance  = $_POST["a_balance"];
        $pers_t_acc = $_POST["to_ac_no"];
        $pers_t_balance = $_POST["t_balance"];

        

 
    #sql query to insert into database
    $sql = "INSERT into balance(Sender ,Receiver ,Balance) VALUES ('$pers_f_acc','$pers_t_acc','$pers_t_balance')";
 
    $res= mysqli_query($conn,$sql);

    $test= $pers_a_balance -  $pers_t_balance ;
    $case= $pers_t_acc+  $pers_t_balance ;


    $sql = "UPDATE customer SET Current_balance='$test' WHERE Sr_no  = '$pers_f_acc'";
    $res= mysqli_query($conn,$sql);


    $sql = "SELECT * FROM customer where Sr_no  = $pers_t_acc";

    $data = mysqli_query($conn,$sql);
    $result= mysqli_fetch_assoc($data);

    $case= $result['Current_balance'] +  $pers_t_balance ;

    $sql = "UPDATE customer SET Current_balance='$case' WHERE Sr_no  = '$pers_t_acc'";
    $res= mysqli_query($conn,$sql);

    if($res){
        $url = "http://localhost/bank/report.php?id=$pers_f_acc";
        ?>
        <script>
            alert("Data inserted properly");
            window.location.href = '<?php echo $url; ?>';
        </script>
        <?php

    }else{
        ?>
        <script>
            alert("error");
        </script>
        <?php
    }
 
    
}
 
 
?>

<!-- <!DOCTYPE html>
<html>
<?php
include("banking_system.php");
?>
<head>
    <title>database</title>
    <style type="text/css">
        table{
            margin-left: auto;
            margin-top: -200px;
            margin-right: auto;
            border-collapse: collapse;
            width:40%;
            color:blue;
            font-family: monospace;
            font-size: 25px;
            text-align: left; 
        }
        th{
            background-color: #0702a6;
            color:white;
        }
        tr:nth-child(even){background-color:  #ccccff;}
        tr:nth-child(odd){background-color:   #ccffff;}
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Sr no</th>
            <th>Sender</th>
            <th>Receiver</th>
            <th>Balance</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost","root","","bank"); 
        $query = "select * from balance";
        $data = mysqli_query($conn,$query);
        $total= mysqli_num_rows($data);
        if($total !=0)
        {
            while($result= mysqli_fetch_assoc($data)){

                echo "<tr><td>" .$result["Sr_no"]. "</td><td>". $result["Sender"]."</td><td>".$result["Receiver"]."</td><td>".$result["Balance"]."</td></tr>";
            }
            
        }
        
        else{
            echo "error";
        }
        
         ?>
        
        
        

    </table>

</body>
</html> -->