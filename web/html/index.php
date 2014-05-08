<!DOCTYPE html>
<?php

require_once('../include/UserTools.php');

error_reporting(E_ALL);
ini_set('display_errors', '1');

$userTools = new UserTools();

$flags = $userTools->getAllFlags();
$games = $userTools->getAllGames();

?>
<html>
    <head>
        <?php require_once('../include/header.php') ?>
    </head>
    <body>
        <div class="ui-grid-b">
            <div class="ui-block-a">
                <fieldset class="ui-grid-a">
                    <div class="ui-block-a"><input type="button" value="Picks" data-theme="b" /></div>
                    <div class="ui-block-b"><input type="button" value="Leaderboard" data-theme="a" onclick="location.href='leaderboard.php';" /></div>
                </fieldset>
            </div>
            <div class="ui-block-a">
                <div style="text-align: center">
                    <h2>Friday, June 13th</h2>
                    <h3>Make your picks</h3>
                </div>
            </div>
            <div class="ui-block-a">
                <ul data-role="listview" > <!-- data-inset="true" -->
                    <?php foreach ($games as $game) { ?>
                    <li>
                        <a href="">
                        <div class="ui-grid-c">
                            <div class="ui-block-a">
                                <img width="100" height="66" src="https://dl.dropboxusercontent.com/sh/uzii4bdixy0gvqy/28QhjxboVH/200px-Flag_of_Uruguay.svg.png?token_hash=AAEM1ThQOdHafAvcUmAs620V7MXebXOrgH7XPUzC5U
A1Sw" />
                            </div>
                            <div class="ui-block-b">
                                <span style="font-family: Arial; color: #CCCCCC; text-align: center;">
                                <h3>9:00 AM</h3>
                                <h3>PST</h3>
                                </span>
                            </div>
                            <div class="ui-block-c">
                                <img width="100" height="66" src="https://dl.dropboxusercontent.com/sh/uzii4bdixy0gvqy/JIN-22f5we/200px-Flag_of_the_Netherlands.svg.png?token_hash=AAEM1ThQOdHafAvcUmAs620V7MXebXOrgH
7XPUzC5UA1Sw" />
                            </div>
                            <div class="ui-block-d">Your pick</div>
                        </div>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </body>
</html>
