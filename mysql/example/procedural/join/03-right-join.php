<?php

/**
 * SELECT column_list
 * FROM table_1
 * RIGHT JOIN table_2 ON join_condition
 */

require_once("../../db/db_procedural_connection.php");

$sql = 'SELECT 
            m.member_id, 
            m.name AS member,
            c.committee_id,
            c.name AS committee
        FROM
            members m
        RIGHT JOIN committees c ON c.name = m.name';

// $sql = "SELECT 
//             m.member_id, 
//             m.name AS member,
//             c.committee_id,
//             c.name AS committee
//         FROM
//             members m
//         RIGHT JOIN committees c ON c.name = m.name
//         WHERE m.member_id IS NOT NULL";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>member_id</th>
                <th>member</th>
                <th>committee_id</th>
                <th>committee</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['member_id'] ?></td>
                <td><?php echo $row['member'] ?></td>
                <td><?php echo $row['committee_id'] ?></td>
                <td><?php echo $row['committee'] ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>

</body>

</html>

<?php mysqli_close($conn) ?>