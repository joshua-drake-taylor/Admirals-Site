<?php

    if($_GET['s']) {
        $standingsPage = file_get_contents("http://www.shlstuff.wtgbear.com/RegSeason/S".$_GET['s']."/SHL-ProTeamSchedule.html");
        
        $standingsPage = explode('<h1 class="TeamSchedulePro_POR"><a id="PortlandAdmirals">Portland Admirals</a></h1>', $standingsPage);
        $standingsPage = explode('<h1 class="TeamSchedulePro_SEA"><a id="SeattleRiot">Seattle Riot</a></h1>', $standingsPage[1]);
        $standingsPage = explode('style="display: block;">', $standingsPage[0]);
        
        $standingsPage = str_replace('<td><a href="SHL-ProTeamRoster.html#PortlandAdmirals">', '<td class="admiralsname"><a href="SHL-ProTeamRoster.html#PortlandAdmirals">', $standingsPage[1]);
        $standingsPage = str_replace('<table class="basictablesorter">', '<table class="basictablesorter" cellspacing="0">', $standingsPage);
        $standingsPage = str_replace('>ST<', '>RESULT<', $standingsPage);
        
        echo $standingsPage;
    }

?>