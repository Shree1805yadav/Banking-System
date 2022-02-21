<?php
$conn = new mysqli("localhost", "root", "", "bank");

$id = 1 ;//$_POST['id'];

$sql = "SELECT Name,Balance  FROM `balance` B INNER JOIN customer C on C.Sr_no = B.`Receiver` where B.Sr_no = $id ";
$result = $conn->query($sql);

$data = '<table>
        <tr>
            <th>Sender</th>
            <th>Balance</th>
        </tr>
            while($row = $result->fetch_assoc()) {

                echo "<tr><td>". $result["Name"]."</td><td>".$result["Balance"]."</td></tr>";
            }
    </table>';

echo $data;