

<?php

$url = $_SERVER['REQUEST_URI'];
$url = explode("=", $url);
$id = $url[count($url) - 1];

$json_string	=	file_get_contents("http://" . $id . "/info"); // id is IP passed on click from serverlist
$serverinfo		=	json_decode($json_string);


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<header>
<style>
  
  h1{
	  font-family: 'Abel', sans-serif;
  }
  ul{
	  font-family: 'Abel', sans-serif;
  }
  ol{
	  font-family: 'Abel', sans-serif;
  }
 
 
  input[type=button], input[type=submit], input[type=reset] {
  background-color: #333333;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  cursor: pointer;
  }

.column {
  float: left;
  width: 35.00%;
  padding-top: 3px;
  margin-top:0%;
}

/* Clear floats after image containers */
.row::after {
  content: "";
  clear: both;
  display: table;
}

.fullscreen-bg {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    overflow: hidden;
    z-index: -100;
}

.fullscreen-bg__video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
@media (min-aspect-ratio: 16/9) {
  .fullscreen-bg__video {
    height: 300%;
    top: -100%;
  }
}

@media (max-aspect-ratio: 16/9) {
  .fullscreen-bg__video {
    width: 300%;
    left: -100%;
  }
}
</style>



<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">

</header>
<body>
<?php
	$serverinfo = json_decode($json_string, true);
	$playernum = count($serverinfo['players']);
	$serverinfo['status']['sv_hostname'] = str_replace(array('^:','^1','^2','^3','^4','^5','^6','^7','^8','^9','^0'), '',$serverinfo['status']['sv_hostname']);
	echo '<div id="auto">';
	echo '<div>';
	echo '<h1>' . $serverinfo['status']['sv_hostname'] . ' - (' . 	$playernum . '/' . $serverinfo['status']['sv_maxclients'] . ')</h1>';
	echo '</div>';


	
	echo '<div class="row" >';
	echo '<div  style="margin-left:13.2%;" class="column">';
	echo '<img src="loadscreen/' . $serverinfo['status']['mapname'] . '.jpg" alt="Snow" style="width:93%;margin-left:20.1%">';
	echo '</div>';
	echo '<div id="auto2" style="margin-left:3.9%;margin-top:-0.9%;" class="column">';
	echo '<ul style="color:#cecece; font-weight: bold;">MAPNAME: ';
		switch ($serverinfo['status']['mapname'])
            {
                case "mp_afghan": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Afghan"),$serverinfo['status']['mapname']); break;
                case "mp_derail": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Derail"),$serverinfo['status']['mapname']); break;
                case "mp_estate": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Estate"),$serverinfo['status']['mapname']); break;
                case "mp_favela": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Favela"),$serverinfo['status']['mapname']); break;
                case "mp_highrise": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Highrise"),$serverinfo['status']['mapname']); break;
				case "mp_shipment": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Shipment"),$serverinfo['status']['mapname']); break;
                case "mp_invasion": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Invasion"),$serverinfo['status']['mapname']); break;
                case "mp_checkpoint": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Karachi"),$serverinfo['status']['mapname']); break;
                case "mp_quarry": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Quarry"),$serverinfo['status']['mapname']); break;
                case "mp_rundown": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Rundown"),$serverinfo['status']['mapname']); break;
                case "mp_rust": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Rust"),$serverinfo['status']['mapname']); break;
                case "mp_boneyard": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Scrapyard"),$serverinfo['status']['mapname']); break;
                case "mp_nightshift": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Skidrow"),$serverinfo['status']['mapname']); break;
                case "mp_subbase": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Sub Base"),$serverinfo['status']['mapname']); break;
                case "mp_terminal": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Terminal"),$serverinfo['status']['mapname']); break;
                case "mp_underpass": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Underpass"),$serverinfo['status']['mapname']); break;
                case "mp_brecourt": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Wasteland"),$serverinfo['status']['mapname']); break;
                case "mp_complex": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Bailout"),$serverinfo['status']['mapname']); break;
                case "mp_crash": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Crash"),$serverinfo['status']['mapname']); break;
                case "mp_overgrown": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Overgrown"),$serverinfo['status']['mapname']); break;
                case "mp_compact": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Salvage"),$serverinfo['status']['mapname']); break;
                case "mp_storm": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Storm"),$serverinfo['status']['mapname']); break;
                case "mp_abandon": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Carnival"),$serverinfo['status']['mapname']); break;
                case "mp_fuel2": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Fuel"),$serverinfo['status']['mapname']); break;
                case "mp_strike": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Strike"),$serverinfo['status']['mapname']); break;
                case "mp_trailerpark": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Trailer Park"),$serverinfo['status']['mapname']); break;
                case "mp_vacant": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Vacant"),$serverinfo['status']['mapname']); break;
                case "mp_nuked": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Nuketown"),$serverinfo['status']['mapname']); break;
                case "mp_cross_fire": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Crossfire"),$serverinfo['status']['mapname']); break;
                case "mp_bloc": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Bloc"),$serverinfo['status']['mapname']); break;
                case "mp_cargoship": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Cargoship"),$serverinfo['status']['mapname']); break;
                case "mp_killhouse": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Killhouse"),$serverinfo['status']['mapname']); break;
                case "mp_bog_sh": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Bog"),$serverinfo['status']['mapname']); break;
                case "mp_cargoship_sh": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Freighter"),$serverinfo['status']['mapname']); break;
                case "mp_shipment_long": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Shipment: Long"),$serverinfo['status']['mapname']); break;
                case "mp_rust_long": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Rust: Long"),$serverinfo['status']['mapname']); break;
                case "mp_firingrange": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Firing Range"),$serverinfo['status']['mapname']); break;
                case "mp_storm_spring": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Chemical Plant"),$serverinfo['status']['mapname']); break;
                case "mp_fav_tropical": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Favela: Tropical"),$serverinfo['status']['mapname']); break;
                case "mp_estate_tropical": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Estate: Tropical"),$serverinfo['status']['mapname']); break;
                case "mp_crash_tropical": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Crash: Tropical"),$serverinfo['status']['mapname']); break;
                case "mp_bloc_sh": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Forgotten City"),$serverinfo['status']['mapname']); break;
                case "oilrig": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Oilrig"),$serverinfo['status']['mapname']); break;
                case "co_hunted": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], strtoupper("Village"),$serverinfo['status']['mapname']); break;
                default: $serverinfo['status']['mapname']; break;
            }
	echo '<ol style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $serverinfo['status']['mapname'] . '</ol>';
	echo '</ul>';
	echo '<ul style="color:#cecece; font-weight: bold;">&nbsp;&nbsp;&nbsp;GAMETYPE: ';
	switch ($serverinfo['status']['g_gametype'])
            {
                case "war": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], strtoupper("Team Deathmatch"),$serverinfo['status']['g_gametype']); break;
                case "dm": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], strtoupper("Free For All"),$serverinfo['status']['g_gametype']); break;
                case "koth": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], strtoupper("Headquarters"),$serverinfo['status']['g_gametype']); break;
                case "sd": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], strtoupper("Search And Destroy"),$serverinfo['status']['g_gametype']); break;
                case "gtnw": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], strtoupper("Global Termonuclear War"),$serverinfo['status']['g_gametype']); break;
                case "oneflag": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], strtoupper("One Flag - Capture The Flag"),$serverinfo['status']['g_gametype']); break;
                case "ctf": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], strtoupper("Capture The Flag"),$serverinfo['status']['g_gametype']); break;
                case "sab": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], strtoupper("Sabotage"),$serverinfo['status']['g_gametype']); break;
                case "vip": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], strtoupper("VIP"),$serverinfo['status']['g_gametype']); break;
                default: $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], strtoupper("Custom Gametype"),$serverinfo['status']['g_gametype']); break;
            }
	echo '<ol style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $serverinfo['status']['g_gametype'] . '</ol>';
	echo '</ul>';
	if(isset($serverinfo['status']['fs_game']))
	{
	echo '<ul style="color:#cecece; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MOD: ';
	echo '<ol style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $serverinfo['status']['fs_game'] . '</ol>';
	echo '</ul>';
	}
	else
	{
	echo '<ul style="color:#cecece; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MOD: ';
	echo '<ol style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NONE</ol>';
	echo '</ul>';	
	}
	if($serverinfo['status']['g_hardcore'] == 1)
	{
	echo '<ul style="color:#cecece; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HARDCORE: ';
	echo '<ol style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YES</ol>';
	echo '</ul>';	
	}
	else
	{
	echo '<ul style="color:#cecece; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;HARDCORE: ';
	echo '<ol style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO</ol>';
	echo '</ul>';	
	}
	if($serverinfo['status']['scr_game_allowkillcam'] == 1)
	{
	echo '<ul style="color:#cecece; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KILLCAM: ';
	echo '<ol style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YES</ol>';
	echo '</ul>';	
	}
	else
	{
	echo '<ul style="color:#cecece; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KILLCAM: ';
	echo '<ol style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NO</ol>';
	echo '</ul>';
	}
	echo '<ul style="color:#cecece; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VERSION: ';
	echo '<ol style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $serverinfo['status']['shortversion'] . '</ol>';
	echo '</ul>';
	echo '<ul style="color:#cecece; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SECURITY: ';
	echo '<ol style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $serverinfo['status']['sv_securityLevel'] . '</ol>';
	echo '</ul>';
	
	echo '</div>';
	echo '</div>';
	
	
	



echo '<div>';
echo '<table style="width:60%">';
echo '<thead>';
echo '<th scope="col">Player name</th>';
echo '<th scope="col">Ping</th>';
echo '<th scope="col">Score</th>';
echo '</thead>';
echo '<tbody>';



					$serverinfo = json_decode($json_string, true);
					
					$serverinfo = $serverinfo['players'];
					usort($serverinfo, function ($a, $b) {
					return $a['score'] < $b['score'];
					});
					
					foreach($serverinfo as $key => $value)
					{

						echo '<tr>';
						$value['name'] = str_replace(array('^:','^1','^2','^3','^4','^5','^6','^7','^8','^9','^0'), '',$value['name']);
						echo '<td data-label="NAME">' . $value['name'] . '</td>';
						if($value['ping'] > "180")
						{
						echo '<td data-label="PING">' . $value['ping'] . ' <img src="ping/1.png" height="20" width="30"></td>';	
						}
						else if($value['ping'] >= "120" && $value['ping'] <= "180")
						{
							echo '<td data-label="PING">' . $value['ping'] . ' <img src="ping/2.png" height="20" width="30"></td>';
						}
						else if($value['ping'] >= "90" && $value['ping'] <= "120")
						{
							echo '<td data-label="PING">' . $value['ping'] . ' <img src="ping/3.png" height="20" width="30"></td>';
						}
						else if($value['ping'] >= "55" && $value['ping'] <= "90")
						{
							echo '<td data-label="PING">' . $value['ping'] . ' <img src="ping/4.png" height="20" width="30"></td>';
						}
						else
						{
							echo '<td data-label="PING">' . $value['ping'] . ' <img src="ping/5.png" height="20" width="30"></td>';
						}
						echo '<td data-label="SCORE">' . $value['score'] . '</td>';	
						echo '</tr>';
					}	


echo '</tbody>';
echo '</table>';
echo '</div>';
echo '</div>';
?>

<script type="text/javascript">
//3 sec refresh for div element

$(document).ready (function () {
$('div#auto').load('serverinfo.php?id=<?php echo $id; ?> #auto');

refresh();
});

function refresh()
{
	setTimeout( function() {
		$('div#auto').load('serverinfo.php?id=<?php echo $id; ?> #auto');
		refresh();
	}, 3000);
}
</script>

</body>
</html>

