

<?php




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


$url = $_SERVER['REQUEST_URI'];
$url = explode("=", $url);
$id = $url[count($url) - 1];
	echo '<div id="auto">';
	
$ch = curl_init('https://kerberos.plutonium.pw/servers'); //pluto ms api
						curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_TIMEOUT, 5);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
						$data = curl_exec($ch);
						$http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
						if(curl_errno($ch) == 0 AND $http == 200) {
						$serverlist = json_decode($data,true);
						}
						else{
							print curl_errno($ch);
						}

	foreach($serverlist['servers'] as $server)
	{
	
	$arr = array($server['ip'],$server['port']);
		$ipaddress = implode(":",$arr);
	
	if($ipaddress == $id)
	{
	
	$playernum = count($server['players']);
	$server['hostname'] = str_replace(array('^:','^1','^2','^3','^4','^5','^6','^7','^8','^9','^0'), '',$server['hostname']);
	
	echo '<div>';
	echo '<h1>' . $server['hostname'] . ' - (' . 	$playernum . '/' . $server['maxplayers'] . ')</h1>';
	echo '</div>';

	echo '<div class="row" >';
	echo '<div  style="margin-left:13.2%;" class="column">';
	echo '<img src="loadscreen/' . $server['map'] . '.jpg" alt="Snow" style="width:93%;margin-left:20.1%">';
	echo '</div>';
	
	switch ($server['map'])
            {
                case "mp_la": $server['map'] = str_replace($server['map'], "Aftermath",$server['map']); break;
                case "mp_dockside": $server['map'] = str_replace($server['map'], "Cargo",$server['map']); break;
                case "mp_carrier": $server['map'] = str_replace($server['map'], "Carrier",$server['map']); break;
                case "mp_drone": $server['map'] = str_replace($server['map'], "Drone",$server['map']); break;
                case "mp_express": $server['map'] = str_replace($server['map'], "Express",$server['map']); break;
				case "mp_hijacked": $server['map'] = str_replace($server['map'], "Hijacked",$server['map']); break;
                case "mp_meltdown": $server['map'] = str_replace($server['map'], "Meltdown",$server['map']); break;
                case "mp_overflow": $server['map'] = str_replace($server['map'], "Overflow",$server['map']); break;
                case "mp_nightclub": $server['map'] = str_replace($server['map'], "Plaza",$server['map']); break;
                case "mp_raid": $server['map'] = str_replace($server['map'], "Raid",$server['map']); break;
                case "mp_slums": $server['map'] = str_replace($server['map'], "Slums",$server['map']); break;
                case "mp_village": $server['map'] = str_replace($server['map'], "Standoff",$server['map']); break;
                case "mp_turbine": $server['map'] = str_replace($server['map'], "Turbine",$server['map']); break;
                case "mp_socotra": $server['map'] = str_replace($server['map'], "Yemen",$server['map']); break;
                case "mp_nuketown_2020": $server['map'] = str_replace($server['map'], "Nuketown 2025",$server['map']); break;
                case "mp_downhill": $server['map'] = str_replace($server['map'], "Downhill",$server['map']); break;
                case "mp_mirage": $server['map'] = str_replace($server['map'], "Mirage",$server['map']); break;
                case "mp_hydro": $server['map'] = str_replace($server['map'], "Hydro",$server['map']); break;
                case "mp_skate": $server['map'] = str_replace($server['map'], "Grind",$server['map']); break;
                case "mp_concert": $server['map'] = str_replace($server['map'], "Encore",$server['map']); break;
                case "mp_magma": $server['map'] = str_replace($server['map'], "Magma",$server['map']); break;
                case "mp_vertigo": $server['map'] = str_replace($server['map'], "Vertigo",$server['map']); break;
                case "mp_studio": $server['map'] = str_replace($server['map'], "Studio",$server['map']); break;
                case "mp_uplink": $server['map'] = str_replace($server['map'], "Uplink",$server['map']); break;
                case "mp_bridge": $server['map'] = str_replace($server['map'], "Detour",$server['map']); break;
                case "mp_castaway": $server['map'] = str_replace($server['map'], "Cove",$server['map']); break;
				case "mp_paintball": $server['map'] = str_replace($server['map'], "Rush",$server['map']); break;
				case "mp_dig": $server['map'] = str_replace($server['map'], "Dig",$server['map']); break;
				case "mp_frostbite": $server['map'] = str_replace($server['map'], "Frost",$server['map']); break;
				case "mp_pod": $server['map'] = str_replace($server['map'], "Pod",$server['map']); break;
				case "mp_takeoff": $server['map'] = str_replace($server['map'], "Takeoff",$server['map']); break;
				case "zm_buried": $server['map'] = str_replace($server['map'], "Buried/Resolution 1295",$server['map']); break;
				case "zm_highrise": $server['map'] = str_replace($server['map'], "Die Rise/Great Leap Forward",$server['map']); break;
				case "zm_nuked": $server['map'] = str_replace($server['map'], "Nuketown",$server['map']); break;
				case "zm_prison": $server['map'] = str_replace($server['map'], "Mob of the Dead",$server['map']); break;
				case "zm_tomb": $server['map'] = str_replace($server['map'], "Origins",$server['map']); break;
				case "zm_transit_dr": $server['map'] = str_replace($server['map'], "Diner",$server['map']); break;
				case "zm_transit": $server['map'] = str_replace($server['map'], "Green Run/Bus Depot/Farm/Town",$server['map']); break;
				default: $server['map']; break;
            }
	
	
	
	
	echo '<div id="auto2" style="margin-left:3.9%;margin-top:-0.9%;" class="column">';
	echo '<ul style="color:#cecece; font-weight: bold;">MAPNAME: ';      
	echo '<ol style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $server['map'] . '</ol>';
	echo '</ul>';
	echo '<ul style="color:#cecece; font-weight: bold;">&nbsp;&nbsp;&nbsp;GAMETYPE: ';
	echo '<ol style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $server['gametype'] . '</ol>';
	echo '</ul>';
	if(isset($server['game']))
	{
	echo '<ul style="color:#cecece; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MOD: ';
	echo '<ol style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $server['game'] . '</ol>';
	echo '</ul>';
	}
	else
	{
	echo '<ul style="color:#cecece; font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MOD: ';
	echo '<ol style="color:white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NONE</ol>';
	echo '</ul>';	
	}
	
	echo '</div>';
	echo '</div>';
	
	
	



echo '<div>';
echo '<table style="width:60%">';
echo '<thead>';
echo '<th scope="col">Player name</th>';
echo '<th scope="col">Ping</th>';
echo '</thead>';
echo '<tbody>';



					
					
					foreach($server['players'] as $key => $value)
					{

						echo '<tr>';
						$value['name'] = str_replace(array('^:','^1','^2','^3','^4','^5','^6','^7','^8','^9','^0'), '',$value['name']);
						echo '<td data-label="NAME">' . $value['name'] . '</td>';
						if($value['ping'] > "180")
						{
						echo '<td data-label="PING">' . $value['ping'] . ' <img src="ping/1.png" height="20" width="30"></td>';	
						}
						else if($value['ping'] > "120" && $value['ping'] < "180")
						{
							echo '<td data-label="PING">' . $value['ping'] . ' <img src="ping/2.png" height="20" width="30"></td>';
						}
						else if($value['ping'] > "90" && $value['ping'] < "120")
						{
							echo '<td data-label="PING">' . $value['ping'] . ' <img src="ping/3.png" height="20" width="30"></td>';
						}
						else if($value['ping'] > "55" && $value['ping'] < "90")
						{
							echo '<td data-label="PING">' . $value['ping'] . ' <img src="ping/4.png" height="20" width="30"></td>';
						}
						else
						{
							echo '<td data-label="PING">' . $value['ping'] . ' <img src="ping/5.png" height="20" width="30"></td>';
						}
						echo '</tr>';
					}	


echo '</tbody>';
echo '</table>';
	}
	}
echo '</div>';
echo '</div>';
?>

<script type="text/javascript">

$(document).ready (function () {
$('div#auto').load('t6serverinfo.php?id=<?php echo $id; ?> #auto');

refresh();
});

function refresh()
{
	setTimeout( function() {
		$('div#auto').load('t6serverinfo.php?id=<?php echo $id; ?> #auto');
		refresh();
	}, 3000);
}
</script>

</body>
</html>

