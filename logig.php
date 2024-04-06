 <?php
        $count = 0;
        foreach ($dates as $date) {

            if ($count % 3 == 0) {
                echo "<tr>"; // Start a new row for every 3 dates
            }
            echo "<td>{$date}</td>"; // Display the date
            $count++;
            if ($count % 3 == 0 || $count == count($dates)) {
                echo "</tr>"; // Close the row after every 3 dates or if it's the last date
            }
        }
        ?>