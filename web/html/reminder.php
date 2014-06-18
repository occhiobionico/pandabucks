<?php

date_default_timezone_set('America/Los_Angeles');

require_once('../include/UserTools.php');
$userTools = new UserTools();

$start_time = strtotime('tomorrow');
$end_time = strtotime('tomorrow 23:59');

$games = $userTools->getAllGamesByDate($start_time, $end_time);
$gameList = "";
$game_ids = array();
foreach ($games as $game) {
    $gameList .= "<tr>";
    $gameList .= "<td>" . $game["team1"] . " vs " . $game["team2"] . "</td>";
    $gameList .= "</tr>";

    array_push($game_ids, $game["game_id"]);
}

$userList = $userTools->getReminders($game_ids);
//echo implode(",", $userList);
//foreach ($userList as $user) {
    $to = 'sid@pandora.com';
    $subject = 'Test email';

    $headers = "From: sid@pandacup.us"  . "\r\n";
    $headers .= "Reply-To: sid@pandacup.us" . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $html = file_get_contents("reminder.html");
    $html = str_replace("#EMAIL", $to, $html);
    $html = str_replace("#GAME_LIST", $gameList, $html);

    $url = 'https://api.sendgrid.com/';
    $user = 'sid@pandacup.us';
    $pass = 'PandaCup3242!';
    $to = 'sid@pandora.com';
    $params = array(
        'api_user'  => $user,
        'api_key'   => $pass,
        'to'        => $to,
        'subject'   => 'Reminder: Select your picks!',
        'html'      => $html,
        'text'      => '',
        'from'      => 'sid@pandacup.us',
    );


    $request =  $url.'api/mail.send.json';

    // Generate curl request
    $session = curl_init($request);
    // Tell curl to use HTTP POST
    curl_setopt ($session, CURLOPT_POST, true);
    // Tell curl that this is the body of the POST
    curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
    // Tell curl not to return headers, but do return the response
    curl_setopt($session, CURLOPT_HEADER, false);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

    // obtain response
    $response = curl_exec($session);
    curl_close($session);

    // print everything out
    print_r($response);
    //break;
//}

?>