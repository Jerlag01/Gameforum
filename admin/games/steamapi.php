<?php

    $api_key = "A471FDEBF544614635B77AA07F19A051";

    $api_url = "http://api.steampowered.com/ISteamApps/GetAppList/v2/?key=$api_key";

	$json = json_decode(file_get_contents($api_url), true);

    /*$join_date = date("D, M j, Y", $json["response"]["players"][0]["timecreated"]);

    function personaState($state)
    {
        if ($state == 1)
        {
            return "Online";
        }
        elseif ($state == 2)
        {
            return "Busy";
        }
        elseif ($state == 3)
        {
            return "Away";
        }
        elseif ($state == 4)
        {
            return "Snooze";
        }
        elseif ($state == 5)
        {
            return "Looking to trade";
        }
        elseif ($state == 6)
        {
            return "Looking to play";
        }
        else
        {
            return "Offline";
        }
    }*/

?>