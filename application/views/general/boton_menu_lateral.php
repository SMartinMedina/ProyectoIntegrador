<li>
<?php

	$linkPart1 = "<div class='pull-left'><i class='zmdi ";
	$linkPart2IconName = $icon;
	$linkPart3 = "mr-20'></i><span class='right-nav-text'>";
	$linkPart4Label = "Turnos";
	$linkPart5 = "</span></div><div class='clearfix'></div>";	
	$link = $linkPart1.$linkPart2IconName.$linkPart3.$seccion.$linkPart5;
						echo anchor(
							$seccionUrl.'/panel',	//'controller/function/uri', 
							$link,		//'Link', 
							'class='.$active.''); 
?>						
</li>