<?php
session_start();

require_once("segments/head.php");
require_once("segments/functions.php");

?>
<div class="container">
    <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th>Staff ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $url = 'https://titan.csit.rmit.edu.au/~e103884/wp/.services/.staff/';
            $response = curl_https($url);
            $array = json_decode($response, true);

            for ($x = 0; $x < count($array); $x++) {
                echo "<tr>";
                echo "<td>" . $array[$x]["staffID"] . "</td>";
                echo "<td>" . $array[$x]["firstName"] . "</td>";
                echo "<td>" . $array[$x]["lastName"] . "</td>";
                echo "<td>" . $array[$x]["email"] . "</td>";
                echo "<td><a href='details.php?staffid=" . $array[$x]["staffID"] . "'>view</a></td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
</div>
<?php
require_once("segments/footer.php");
?>

</body>


</html>