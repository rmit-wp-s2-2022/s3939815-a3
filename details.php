<?php
session_start();

require_once("segments/head.php");
require_once("segments/functions.php");

?>

<div class="container">
    <?php
    $staffid = explode('=', $_SERVER['QUERY_STRING'])[1];
    echo "<h1>staff " . $staffid . "</h1>";
    ?>
    <table class="table table-striped table-bordered table-hover table-condensed">
        <thead>
            <tr>
                <th>Course ID</th>
                <th>Title</th>
                <th>Credit Points</th>
                <th>Career</th>
                <th>Coordinator</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $url = 'https://titan.csit.rmit.edu.au/~e103884/wp/.services/.staff/?id=' . $staffid;
            $response = curl_https($url);
            $array = json_decode($response, true);

            for ($x = 0; $x < count($array["courses"]); $x++) {
                echo "<tr>";
                echo "<td>" . $array["courses"][$x]["courseID"] . "</td>";
                echo "<td>" . $array["courses"][$x]["title"] . "</td>";
                echo "<td>" . $array["courses"][$x]["creditPoints"] . "</td>";
                echo "<td>" . $array["courses"][$x]["career"] . "</td>";
                echo "<td>" . $array["courses"][$x]["coordinator"] . "</td>";
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