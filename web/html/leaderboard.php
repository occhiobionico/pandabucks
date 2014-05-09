<!DOCTYPE html>
<html>
<head>
    <?php

    require_once('../include/header.php');
    require_once('../include/UserTools.php');

    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    $userTools = new UserTools();

    $leaderboard = $userTools->getLeaderboard();
   
    if(is_null($leaderboard)) {
    die("error. could not retrieve leaderboard.");
}
    date_default_timezone_set('America/Los_Angeles');
    $page = $_SERVER['PHP_SELF'];
?>

    <meta http-equiv="refresh" content="10;URL='<?php echo $page?>'">
</head>
<body>
<div class="ui-grid-b">
    <div class="ui-block-a">
        <div data-role="header" style="background-color: #00d170;">
            <img height="75px" src="img/full-logo.png" style="display: block; margin:auto;">
        </div>
        <fieldset class="ui-grid-a">
            <div class="ui-block-a"><input type="submit" value="Picks" data-theme="a" onclick="location.href='index.php';" /></div>
            <div class="ui-block-b"><input type="reset" value="Leaders" data-theme="b" /></div>
        </fieldset>
    </div>
    <div class="ui-block-a">
        <div style="text-align: center">
            <div style="text-align: center">
                <h2><?php echo date('j F h:i A'); ?></h2>
            </div>
        </div>
    </div>

    <div class="ui-block-a">
        <table data-role="table" data-mode="reflow" class="ui-responsive table-stroke ui-grid-solo">
            <thead>
                <tr>
                    <th>&nbsp;</th>
                    <th>Rank</th>
                    <th>Name</th>
                    <th>Points</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $rank_num = 1;
                    foreach ($leaderboard as $row) {
                        echo '<tr>';
                            echo '<td><img height="150px" src="img/'.$row["user_id"].'.jpg"</td>';
                            echo '<td>' . $rank_num . '</td>';
                            echo '<td>' . $row['user_id'] . '</td>';
                            echo '<td>' . number_format($row['points']) . '</td>';
                        echo '</tr>';

                        $rank_num += 1;
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
