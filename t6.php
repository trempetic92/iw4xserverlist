
<?php
ini_set('default_socket_timeout', 45);

					$ch = curl_init('https://kerberos.plutonium.pw/servers'); // Plutonium master server API
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

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<header>
<script src="http://code.jquery.com/jquery-1.5.js"></script>
<script type="text/javascript">
      var TableSorter = {
    makeSortable: function(table){
        // Store context of this in the object
        var _this = this;
        var th = table.tHead, i;
        th && (th = th.rows[0]) && (th = th.cells);

        if (th){
            i = th.length;
        }else{
            return; // if no `<thead>` then do nothing
        }

        // Loop through every <th> inside the header
        while (--i >= 0) (function (i) {
            var dir = 1;

            // Append click listener to sort
            th[i].addEventListener('click', function () {
                _this._sort(table, i, (dir = 1 - dir));
            });
        }(i));
    },
    _sort: function (table, col, reverse) {
        var tb = table.tBodies[0], // use `<tbody>` to ignore `<thead>` and `<tfoot>` rows
        tr = Array.prototype.slice.call(tb.rows, 0), // put rows into array
        i;

        reverse = -((+reverse) || -1);

        // Sort rows
        tr = tr.sort(function (a, b) {
            // `-1 *` if want opposite order
            return reverse * (
                // Using `.textContent.trim()` for test
                a.cells[col].textContent.trim().localeCompare(
                    b.cells[col].textContent.trim()
                )
            );
        });

        for(i = 0; i < tr.length; ++i){
            // Append rows in new order
            tb.appendChild(tr[i]);
        }
    }
};
    </script>

<style>


 
  h1{
	  font-family: 'Abel', sans-serif;
  }
 
  input[type=button], input[type=submit], input[type=reset] {
  background-color: #333333;
  border: none;
  color: white;
  padding: 5px 5px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
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


.base, .panel-container .panel, .cp-mini, .navigation a, .cp-main .pm {
    background: rgba(0, 0, 0, 0.5);
}

.base2 { /* Cat Headers */
	background: rgba(255,255,255,0.1);	
}

.tabs .tab > a {
	background: rgba(255,255,255,0.05);
}

.panel, .tabs .activetab > a, .tabs .activetab > a:hover, .navigation .active-subsection a {
	background-color: rgba(255,255,255,0.1);
}

li.row, hr, .signature, .postprofile, .pm .postprofile, .panel-container .panel li.row, fieldset.polls dl  {border-color: rgba(255,255,255,0.1);}

.post {border-color: rgba(255,255,255,0.5);}


/* Dark */

/* Main base is dynamically set in overall_header.html via H2O Control Panel */


.badge {
	background: rgba(0,0,0,0.2) !important;
}

.navbar a:hover {
	background: rgba(0,0,0,0.1);
}

/* Other */
.reported, .rules, p.post-notice, #phpbb_announcement {
	background: rgba(255,0,0,0.3) !important;	
}

.server:hover {
  background-color: #5e5e5e;
}

.hidden {
  visibility: hidden;
}
</style>
<meta charset="UTF-8">
<link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="theme/animate.css">
<link rel="stylesheet" href="theme/base.css">
<link rel="stylesheet" href="theme/bidi.css">
<link rel="stylesheet" href="theme/buttons.css">
<link rel="stylesheet" href="theme/common.css">
<link rel="stylesheet" href="theme/fonts.css">
<link rel="stylesheet" href="theme/h2o.css">
<link rel="stylesheet" href="theme/normalize.css">
<link rel="stylesheet" href="theme/utilities.css">
<link rel="stylesheet" href="theme/icons.css">
<link rel="stylesheet" href="theme/colours.css">
<link rel="stylesheet" href="theme/icons_forums_topics.css">
<link rel="stylesheet" href="theme/links.css">
<link rel="stylesheet" href="theme/merlin.css">
<link rel="stylesheet" href="theme/opacity.css">
<link rel="stylesheet" href="theme/extensions.css">
<link rel="stylesheet" href="theme/stylesheet.css">
<link rel="stylesheet" href="theme/tooltipster.bundle.min.css">
<link rel="stylesheet" href="theme/tooltipster-sideTip-borderless.min.css">
<link rel="stylesheet" href="theme/tweaks.css">
<link rel="stylesheet" href="theme/responsive/large-desktops.css">
<link rel="stylesheet" href="theme/responsive/medium-ipad.css">
<link rel="stylesheet" href="theme/responsive/responsive.css">
<link rel="stylesheet" href="theme/responsive/small-smaller-tablets.css">
<link rel="stylesheet" href="theme/responsive/squishy.css">
<link rel="stylesheet" href="theme/responsive/xs-phones.css">
<link rel="stylesheet" href="theme/colour-presets/Orange.css">
<link rel="stylesheet" href="../assets/css/font-awesome.min.css">

<div class="fullscreen-bg">
    
        <source src="css/background.png">
    
</div>

</header>
<body background="css/background.png">
<div class="container">
<div class="top_bar base" style="width: 85%;margin: 0 auto;">
   
    <ul class="menu">
      <li style="font-size:16px"><a style="font-size:16px" href="../index.php">Forums</a></li>
      <li style="font-size:16px"><a  style="font-size:16px" href="http://forums.verum-clutch.com/serverlist">IW4X SERVERLIST</a></li>
	  <li style="font-size:16px"><a  style="font-size:16px" href="http://forums.verum-clutch.com/serverlist/t5.php">REKT T5 SERVERLIST</a></li> 
	  <li style="font-size:16px" class="active"><a  style="font-size:16px" href="http://forums.verum-clutch.com/serverlist/t6.php">PLUTONIUM T6 SERVERLIST</a></li>  
	</ul>
	<div class="social_links_header">
    <a href="http://forums.verum-clutch.com/serverlist/searchplayer.php" class="navbar_top_search"><span class="icon fa-search"></span></a>    </div>
</div>
</br>
</div>
</br>
<div class="here">
<table class="container" id="tablelist" style="width: 85%;margin: 0 auto;">
<thead>
<tr>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">SERVERNAME</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">LOCATION</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">GAME MODE</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">GAMETYPE</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">MAPNAME</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">IP ADDRESS</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">PLAYERS</th>
</tr>
</thead>
<tbody>
<?php
	$servers = 0;
	$playertotal = 0;
	$zombies = 0;
	$multiplayer = 0;
	
	
	echo '<tr>';
	foreach($serverlist['servers'] as $server)
	{
		$server['hostname'] = str_replace(array('^:','^1','^2','^3','^4','^5','^6','^7','^8','^9','^0'), '',$server['hostname']);
		$json_str	=	file_get_contents('http://extreme-ip-lookup.com/json/' .$server['ip']);
						$location	=	json_decode($json_str,true);
		
		
		$arr = array($server['ip'],$server['port']);
		$ipaddress = implode(":",$arr);
		
		
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
		
		echo '<td class="server" data-label="SERVERNAME"><a target="_blank" style="color:white;text-decoration: none" href="t6serverinfo.php?id=' . $ipaddress . '">' .  $server['hostname']  . '</a></td>';
		echo '<td data-label="LOCATION"><span class="hidden">'.  $location['countryCode']  .'</span><span><img title="'.$location['country'].'" src="https://www.countryflags.io/' .  $location['countryCode']  . '/shiny/32.png"></span></td>';
		
		if($server['game'] == "t6zm")
		{
			echo '<td data-label="GAME MODE">Zombies</td>';
		}
		else
		{
			echo '<td data-label="GAME MODE">Multiplayer</td>';	
		}
		
					switch ($server['gametype'])
            {
                case "tdm": $server['gametype'] = str_replace($server['gametype'], "Team Deathmatch",$server['gametype']); break;
                case "dm": $server['gametype'] = str_replace($server['gametype'], "Free For All",$server['gametype']); break;
                case "koth": $server['gametype'] = str_replace($server['gametype'], "Headquarters",$server['gametype']); break;
                case "shrp": $server['gametype'] = str_replace($server['gametype'], "Sharpshooter",$server['gametype']); break;
				case "oic": $server['gametype'] = str_replace($server['gametype'], "One in the Chamber",$server['gametype']); break;
				case "sas": $server['gametype'] = str_replace($server['gametype'], "Sticks and Stones",$server['gametype']); break;
				case "sd": $server['gametype'] = str_replace($server['gametype'], "Search And Destroy",$server['gametype']); break;
                case "gtnw": $server['gametype'] = str_replace($server['gametype'], "Global Termonuclear War",$server['gametype']); break;
                case "oneflag": $server['gametype'] = str_replace($server['gametype'], "One Flag - Capture The Flag",$server['gametype']); break;
                case "ctf": $server['gametype'] = str_replace($server['gametype'], "Capture The Flag",$server['gametype']); break;
                case "sab": $server['gametype'] = str_replace($server['gametype'], "Sabotage",$server['gametype']); break;
                case "vip": $server['gametype'] = str_replace($server['gametype'], "VIP",$server['gametype']); break;
                default: $server['gametype']; break;
            }
		
		
		echo '<td data-label="AGEMTYPE">'.$server['gametype'].'</td>';
		echo '<td data-label="MAPNAME">'.$server['map'].'</td>';
		echo '<td data-label="I">'.$server['ip'].':'.$server['port'].'</td>';
		
		
				$playernum = count($server['players']);
				$playertotal = $playertotal + $playernum;
				
		if($server['game'] == "t6zm")
		{
			$zombies = $zombies + 1;
		}
		else 
		{
			$multiplayer = $multiplayer + 1;
		}
		
		
		if($playernum < 10 && $playernum != 0 )
							{
								echo '<td onclick="sortTable(0);" data-label="PLAYERS"><p class="hidden">0</p>' . $playernum .'/' . $server['maxplayers'] . '</td>';
							}
						else
						{
							echo '<td onclick="sortTable(0);" data-label="PLAYERS">' . $playernum .'/' . $server['maxplayers'] . '</td>';
						}
		
		
		
		$servers = $servers + 1;
		
		echo '</tr>';
	}
	
	

echo '<h1 style="color:#cecece">'.$servers.' SERVERS (ZM - '.$zombies.' / MP - '.$multiplayer.') - '.$playertotal.' PLAYERS</h1>';
?>
</br>
</tbody>
</table>
<script>
window.onload = function(){
   TableSorter.makeSortable(document.getElementById("tablelist"));
};
</script>
</div>

<a href="#" class="scrollToTop" style="display: inline-block;"><span class="fa fa-arrow-up"></span></a>

</head>
<body>
</body>
</html>


