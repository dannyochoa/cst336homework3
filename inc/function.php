<?php
    function addItem($message, $info, $started, $category, $urgent, $count){
    echo "<tr>";
    echo "<td>$message</td>";
    echo "<td>$info</td>";
    echo "<td>$started</td>";
    echo "<td>$category</td>";
    echo "<td>$urgent</td>";
    echo "<td><input type='submit' value= $count name ='done'/></td>";
    echo "</tr>";
    }

?>