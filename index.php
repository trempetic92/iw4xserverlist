<?php
	// define the path and name of cached file
	$cachefile = 'cached-files/'.date('M-d-Y').'.php';
	// define how long we want to keep the file in seconds. I set mine to 5 hours.
	$cachetime = 700;
	// Check if the cached file is still fresh. If it is, serve it up and exit.
	if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)) {
   	include($cachefile);
    	exit;
	}
	// if there is either no file OR the file to too old, render the page and capture the HTML.
	ob_start();
?>
<?php
ini_set('default_socket_timeout', 45);
$json_string	=	file_get_contents("http://138.201.26.173:28960/info"); 
$serverinfo		=	json_decode($json_string);

$json_string2	=	file_get_contents("http://138.201.26.173:28960/serverlist"); //STarting point that acts like masterserver. Any server ip you like
$serverlist		=	json_decode($json_string2);


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<header>
<script src="http://code.jquery.com/jquery-1.5.js"></script>

<script type="text/javascript">
//TABLE SORTING SCRIPT
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
      <li style="font-size:16px" class="active"><a  style="font-size:16px" href="http://forums.verum-clutch.com/serverlist">IW4X SERVERLIST</a></li>
<li style="font-size:16px"><a  style="font-size:16px" href="http://forums.verum-clutch.com/serverlist/t5.php">REKT T5 SERVERLIST</a></li> 
	  <li style="font-size:16px"><a  style="font-size:16px" href="http://forums.verum-clutch.com/serverlist/t6.php">PLUTONIUM T6 SERVERLIST</a></li> 	  
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
<th style="width:230px" onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">SERVERNAME</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">LOCATION</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">MOD</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">GAMETYPE</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">MAPNAME</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">IP ADDRESS</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -1; asc2 = 1; asc3 = 1;" scope="col">JOIN SERVER</th>
<th onclick="table_sort(people, 0, asc1); asc1 *= -2; asc2 = 2; asc3 = 2;" scope="col">PLAYERS</th>
</tr>
</thead>
<tbody>
<?php

					$serverinfo2 = json_decode($json_string);
					
					$servernum = 0;
					$playertotal = 0;
					
					foreach($serverlist as $value)
					{	
					$servernum = $servernum + 1;	
						//Dont mind this
					if($value != "192.223.27.163:28962" && $value != "192.223.27.163:28961" 
					&& $value != "192.223.27.163:28960" && $value != "192.223.27.163:28963" && $value != "192.223.27.163:28964"
					&& $value != "192.223.27.163:28965" && $value != "71.231.105.102:28974" && $value != "71.231.105.102:28978"
					&& $value != "71.231.105.102:28977" && $value != "71.231.105.102:28975" && $value != "116.203.58.65:28962"
					&& $value != "149.202.86.115:28963" && $value != "149.202.86.115:28961" && $value != "149.202.86.115:28964"
					&& $value != "139.99.130.37:28960"  && $value != "116.203.58.65:28960"  && $value != "149.202.86.115:28962"
					&& $value != "71.231.105.102:28973" && $value != "95.188.71.27:28971"   && $value != "18.231.179.140:28960"
					&& $value != "116.203.58.65:28961"  && $value != "3.122.180.40:28961"   && $value != "51.38.98.28:28962"
					&& $value != "192.159.65.156:28963" && $value != "192.159.65.156:28963" && $value != "149.202.86.115:28960"
					&& $value != "51.38.98.28:28960"    && $value != "77.255.21.134:28960"  && $value != "51.38.98.28:28963"
					&& $value != "51.38.98.28:28964"    && $value != "70.42.74.241:28961"   && $value != "51.38.98.28:28961"
					&& $value != "75.30.89.226:28961"   && $value != "159.253.117.169:28960"&& $value != "13.234.119.143:28960"
					&& $value != "127.0.0.1:28960"      && $value != "127.0.0.1:28970"      && $value != "127.0.0.1:28965"
					&& $value != "127.0.0.1:28975")
					{
						
						
						$ch = curl_init('http://' . $value . '/info');
						curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
						curl_setopt($ch, CURLOPT_TIMEOUT, 5);
						$data = curl_exec($ch);
						$http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
						if(curl_errno($ch) == 0 AND $http == 200) {
						$serverinfo = json_decode($data,true);
						}
						
						
						$serverip = explode(":", $value);
						$json_str	=	file_get_contents('http://extreme-ip-lookup.com/json/' .$serverip[0]);
						$location	=	json_decode($json_str,true);
			
						
						if(isset($serverinfo['status']['sv_hostname']))
						{
						echo '<tr>';
						$serverinfo['status']['sv_hostname'] = str_replace(array('^:','^1','^2','^3','^4','^5','^6','^7','^8','^9','^0'), '',$serverinfo['status']['sv_hostname']);
						echo '<td class="server" data-label="SERVERNAME"><a target="_blank" style="color:white;text-decoration: none" href="serverinfo.php?id=' . $value . '">' .  $serverinfo['status']['sv_hostname']  . '</a></td>';
						}

						if(isset($serverinfo['status']['mapname']))
						{
						
						switch ($serverinfo['status']['mapname'])
            {
                case "mp_afghan": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Afghan",$serverinfo['status']['mapname']); break;
                case "mp_derail": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Derail",$serverinfo['status']['mapname']); break;
                case "mp_estate": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Estate",$serverinfo['status']['mapname']); break;
                case "mp_favela": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Favela",$serverinfo['status']['mapname']); break;
                case "mp_highrise": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Highrise",$serverinfo['status']['mapname']); break;
				case "mp_shipment": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Shipment",$serverinfo['status']['mapname']); break;
                case "mp_invasion": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Invasion",$serverinfo['status']['mapname']); break;
                case "mp_checkpoint": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Karachi",$serverinfo['status']['mapname']); break;
                case "mp_quarry": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Quarry",$serverinfo['status']['mapname']); break;
                case "mp_rundown": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Rundown",$serverinfo['status']['mapname']); break;
                case "mp_rust": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Rust",$serverinfo['status']['mapname']); break;
                case "mp_boneyard": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Scrapyard",$serverinfo['status']['mapname']); break;
                case "mp_nightshift": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Skidrow",$serverinfo['status']['mapname']); break;
                case "mp_subbase": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Sub Base",$serverinfo['status']['mapname']); break;
                case "mp_terminal": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Terminal",$serverinfo['status']['mapname']); break;
                case "mp_underpass": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Underpass",$serverinfo['status']['mapname']); break;
                case "mp_brecourt": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Wasteland",$serverinfo['status']['mapname']); break;
                case "mp_complex": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Bailout",$serverinfo['status']['mapname']); break;
                case "mp_crash": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Crash",$serverinfo['status']['mapname']); break;
                case "mp_overgrown": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Overgrown",$serverinfo['status']['mapname']); break;
                case "mp_compact": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Salvage",$serverinfo['status']['mapname']); break;
                case "mp_storm": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Storm",$serverinfo['status']['mapname']); break;
                case "mp_abandon": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Carnival",$serverinfo['status']['mapname']); break;
                case "mp_fuel2": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Fuel",$serverinfo['status']['mapname']); break;
                case "mp_strike": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Strike",$serverinfo['status']['mapname']); break;
                case "mp_trailerpark": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Trailer Park",$serverinfo['status']['mapname']); break;
                case "mp_vacant": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Vacant",$serverinfo['status']['mapname']); break;
                case "mp_nuked": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Nuketown",$serverinfo['status']['mapname']); break;
                case "mp_cross_fire": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Crossfire",$serverinfo['status']['mapname']); break;
                case "mp_bloc": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Bloc",$serverinfo['status']['mapname']); break;
                case "mp_cargoship": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Cargoship",$serverinfo['status']['mapname']); break;
                case "mp_killhouse": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Killhouse",$serverinfo['status']['mapname']); break;
                case "mp_bog_sh": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Bog",$serverinfo['status']['mapname']); break;
                case "mp_cargoship_sh": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Freighter",$serverinfo['status']['mapname']); break;
                case "mp_shipment_long": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Shipment: Long",$serverinfo['status']['mapname']); break;
                case "mp_rust_long": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Rust: Long",$serverinfo['status']['mapname']); break;
                case "mp_firingrange": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Firing Range",$serverinfo['status']['mapname']); break;
                case "mp_storm_spring": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Chemical Plant",$serverinfo['status']['mapname']); break;
                case "mp_fav_tropical": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Favela: Tropical",$serverinfo['status']['mapname']); break;
                case "mp_estate_tropical": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Estate: Tropical",$serverinfo['status']['mapname']); break;
                case "mp_crash_tropical": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Crash: Tropical",$serverinfo['status']['mapname']); break;
                case "mp_bloc_sh": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Forgotten City",$serverinfo['status']['mapname']); break;
                case "oilrig": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Oilrig",$serverinfo['status']['mapname']); break;
                case "co_hunted": $serverinfo['status']['mapname'] = str_replace($serverinfo['status']['mapname'], "Village",$serverinfo['status']['mapname']); break;
                default: $serverinfo['status']['mapname']; break;
            }
						
						
						switch ($serverinfo['status']['g_gametype'])
            {
                case "war": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], "Team Deathmatch",$serverinfo['status']['g_gametype']); break;
                case "dm": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], "Free For All",$serverinfo['status']['g_gametype']); break;
                case "koth": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], "Headquarters",$serverinfo['status']['g_gametype']); break;
                case "sd": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], "Search And Destroy",$serverinfo['status']['g_gametype']); break;
                case "gtnw": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], "Global Termonuclear War",$serverinfo['status']['g_gametype']); break;
                case "oneflag": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], "One Flag - Capture The Flag",$serverinfo['status']['g_gametype']); break;
                case "ctf": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], "Capture The Flag",$serverinfo['status']['g_gametype']); break;
                case "sab": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], "Sabotage",$serverinfo['status']['g_gametype']); break;
                case "vip": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], "VIP",$serverinfo['status']['g_gametype']); break;
				case "dom": $serverinfo['status']['g_gametype'] = str_replace($serverinfo['status']['g_gametype'], "Domination",$serverinfo['status']['g_gametype']); break;
                default: $serverinfo['status']['g_gametype']; break;
            }
						if($location['countryCode'] == "AP")
						{
							echo '<td data-label="LOCATION"><span class="hidden">'.  $location['countryCode']  .'</span><span><img title="India" src="https://www.countryflags.io/IN/shiny/32.png"></span></td>';
						}
						else {
						echo '<td data-label="LOCATION"><span class="hidden">'.  $location['countryCode']  .'</span><span><img title="'.$location['country'].'" src="https://www.countryflags.io/' .  $location['countryCode']  . '/shiny/32.png"></span></td>';
						}
						if(isset($serverinfo['status']['fs_game'])){
						$modname = explode("/", $serverinfo['status']['fs_game']);
						echo '<td data-label="MOD">' .  $modname[1]  . '</td>';
						}
						else{
						echo '<td data-label="MOD"></td>';
						}
						echo '<td data-label="GAMETYPE">' .  $serverinfo['status']['g_gametype']  . '</td>';
						
						echo '<td data-label="MAPNAME">' .  $serverinfo['status']['mapname']  . '</td>'; 	
							
						
						echo '<td data-label="IP ADDRESS">' . $value . '</td>';	
						echo '<td>';
						echo '<form action="iw4x://"' . $value . '>';
						echo '<input type="submit" value="Connect" />';
						echo '</form>';
						echo '</td>';
						}
						$playernum = 0;
						if(!empty($serverinfo['players']))
					{
						$playernum = count($serverinfo['players']);
					}
						if($serverinfo){
						foreach($serverinfo as $key => $value)
						{

						$playertotal = $playertotal + 1;
						
						}
						}
						
						
						
						if(isset($serverinfo['status']['sv_maxclients']))
						{
							if($playernum < 10 && $playernum != 0 )
							{
								echo '<td onclick="sortTable(0);" data-label="PLAYERS"><p class="hidden">0</p>' . $playernum .'/' . $serverinfo['status']['sv_maxclients'] . '</td>';
							}
						else
						{
							echo '<td onclick="sortTable(0);" data-label="PLAYERS">' . $playernum .'/' . $serverinfo['status']['sv_maxclients'] . '</td>';
						}
						}
						echo '</tr>';
					
					}
					}
					
					
				?>
<h1 style="color:#cecece"><?php  echo $servernum ?> SERVERS - <?php echo $playertotal?> PLAYERS</h2>
</br>
</tbody>
</table>
<script>
window.onload = function(){
   TableSorter.makeSortable(document.getElementById("tablelist"));
};

$(document).ready(function(){

	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});

	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body, head').animate({scrollTop : 0},800);
		return false;
	});

});
</script>
</div>

<a href="#" class="scrollToTop" style="display: inline-block;"><span class="fa fa-arrow-up"></span></a>

</head>
<body>
</body>
</html>

<?php
	
	// We're done! Save the cached content to a file
	$fp = fopen($cachefile, 'w');
	fwrite($fp, ob_get_contents());
	fclose($fp);
	// finally send browser output
	ob_end_flush();
?>
