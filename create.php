<?php
session_start();

require_once("segments/head.php");
require_once("segments/functions.php");

?>
<?php
$courseidErr = $titleErr = "";
$courseid = $title = $career = "";
$creditpoints = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $courseid = $_POST["courseid"];
    $courseidErr = validate_courseid($courseid);

    $title = $_POST["title"];
    $titleErr = validate_title($title);

    $creditpoints = $_POST["creditpoints"];

    $career = $_POST["career"];

    if (empty($courseidErr) && empty($titleErr)) {
        header("Location: index.php");
    }
}


?>
<script>
    $(document).ready(function() {
        $("span#creditpoints").text(<?php echo $creditpoints ?>);
        $("input[name='creditpoints']").change(function() {
            $("span#creditpoints").text($(this).val());
        })
    });
</script>

<div class="container">
    <h2>Create Course</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        Course ID: <input type="text" name="courseid" value="<?php echo $courseid; ?>">
        <span class="error"><?php echo $courseidErr; ?></span>
        <br><br>
        Title: <input type="text" name="title" value="<?php echo $title; ?>">
        <span class="error"><?php echo $titleErr; ?></span>
        <br><br>
        Credit Points: <input type="range" min="1" max="12" name="creditpoints" defaultValue="<?php echo $creditpoints; ?>" value="<?php echo $creditpoints; ?>"><span id="creditpoints"></span>
        <br><br>
        Career:
        <select name="career">
            <option value="Undergraduate" <?php echo $career == "Undergraduate" ? "selected" : ""; ?>>Undergraduate</option>
            <option value="Postgraduate" <?php echo $career == "Postgraduate" ? "selected" : ""; ?>>Postgraduate</option>
        </select>
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>
<?php
require_once("segments/footer.php");
?>
</body>


</html>
