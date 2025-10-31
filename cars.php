<?php

require_once 'settings.php';
$dbcon = @mysqli_connect ($host,$user,$pwd,$sql_db);

if ($dbcon)
{
    $query = "SELECT * FROM cars";
    $result = mysqli_query($dbcon, $query);

    if ($result)
    {
        echo "<h2>Car Listings</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Car ID</th>
                    <th>Make</th>
                    <th>Model</th>
                    <th>Year</th>
                    <th>Price</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result))
        {
            echo "<tr>
                    <td>{$row['car_id']}</td>
                    <td>{$row['make']}</td>
                    <td>{$row['model']}</td>
                    <td>{$row['year']}</td>
                    <td>{$row['price']}</td>
                  </tr>";
        }

        echo "</table>";
        mysqli_free_result($result);
    }
    else
    {
        echo "<p>Error retrieving car data.</p>";
    }
}

else 
{
    echo "<p>Unable to connect.</p>";
}

?>