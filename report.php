<!DOCTYPE html>
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
            <th>Receiver</th>
            <th>Balance</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost","root","","bank"); 
        $id = $_REQUEST['id'];
        $query = "SELECT Name,Balance  FROM `balance` B INNER JOIN customer C on C.Sr_no = B.`Receiver` where B.Sender = $id ";
        $data = mysqli_query($conn,$query);
        $total= mysqli_num_rows($data);
        if($total !=0)
        {
            $i =1 ;
            while($result= mysqli_fetch_assoc($data)){

                echo "<tr><td>" .$i++. "</td><td>" .$result["Name"]. "</td><td>". $result["Balance"]."</td></tr>";
            }
            
        }
        
        else{
            echo "error";
        }
        
         ?>
        
        
        

    </table>

</body>
</html>