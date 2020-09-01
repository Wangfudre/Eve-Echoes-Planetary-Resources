<?php

$link = mysqli_connect("localhost","username","password","dbname");

echo '<form action="search.php" method="post">
<h1>Planetary Resources</h1>';


$sql2 = "SELECT Resource FROM eveplanets GROUP BY Resource;";
$result2 = mysqli_query($link,$sql2);
if ($result2 != 0) {
    echo '<label>Resource:';
    echo '<select name="Res">';
    echo '<option value="">Any Resource</option>';

    $num_results = mysqli_num_rows($result2);
    for ($i=0;$i<$num_results;$i++) {
        $row = mysqli_fetch_array($result2);
        $name2 = $row['Resource'];
        echo '<option value="' .$name2. '">' .$name2. '</option>';
    }

    echo '</select>';
    echo '</label>';
}

echo "<p>";

$sql = "SELECT Region FROM eveplanets GROUP BY Region;";

$result = mysqli_query($link,$sql);
if ($result != 0) {
    echo '<label>Region:';
    echo '<select name="Reg">';
    echo '<option value="">Any Region</option>';

    $num_results = mysqli_num_rows($result);
    for ($i=0;$i<$num_results;$i++) {
        $row = mysqli_fetch_array($result);
        $name = $row['Region'];
        echo '<option value="' .$name. '">' .$name. '</option>';
    }

    echo '</select>';
    echo '</label>';
}

echo "<p>";

$sql3 = "SELECT Richness FROM eveplanets GROUP BY Richness;";

$result3 = mysqli_query($link,$sql3);
if ($result3 != 0) {
    echo '<label>Richness:';
    echo '<select name="Rich">';
    echo '<option value="">Any Richness</option>';

    $num_results = mysqli_num_rows($result3);
    for ($i=0;$i<$num_results;$i++) {
        $row = mysqli_fetch_array($result3);
        $name3 = $row['Richness'];
        echo '<option value="' .$name3. '">' .$name3. '</option>';
    }

    echo '</select>';
    echo '</label>';
}

mysqli_close($link);

echo '</p>
<input type ="submit">
</form>';






