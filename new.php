<html>
<head></head>
<body>
<?php
$db= new SQLite3('users.db');

$results = $db->query('select rowid,username,password from user');
echo '<table>';
while ($row = $results->fetchArray()) {
    echo '<tr>';
    for ($i=0; $i < count($row)/2; $i++) { 
        echo '<td>';
        echo $row[$i];
        echo '</td>';
    }
    echo '</tr>';
    }
echo '</table>';
?>
</body>
<style> tr ,th, td{border:1px solid black;}</style>
</html>