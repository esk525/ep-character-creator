<?php
require_once '../../../php/EPCharacterCreator.php';
session_start();
?>
<ul class="mainlist" id="motivation">
	<?php
			if(count($_SESSION['cc']->getMotivations()) < 10) {
			
				echo "<li>
						<input type='text' id='motToAdd' placeholder='Enter a motivation'/>
						<span class='slowTransition iconPlusMinus' id='addMotiv' data-icon='&#x3a;'></span>
					  </li>";
					  
			}
			echo "<div id='motivationsList'>";
		
		
			if($_SESSION['cc']->getMotivations() != null){
				$motForm = "";
				foreach($_SESSION['cc']->getMotivations() as $m){
					echo "<li>".$m."</span><span class='remMotiv slowTransition iconPlusMinus' id='".$m."' data-icon='&#x39;'></li>";
				}
			}
			else{
				echo "";
			}
		?>
	</div>
</ul>
