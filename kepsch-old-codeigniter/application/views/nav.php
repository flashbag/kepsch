		<div id="nav">

			<span>				
				<a href="<?php echo base_url(); ?>">головна</a>
				&nbsp;&raquo;&nbsp;
				<?php
				switch ($this->uri->segment(1)) { 

					case 'group':		echo anchor('groups','групи');			break; 
					case 'teacher':		echo anchor('teachers','викладачі'); 	break; 

					case 'admin':		echo 'адміністрування';					break;

					case 'teachers':	echo 'викладачі';						break; 
					case 'teacher':		echo 'групи';							break;

 					default: $nothing = true; break; 
 				}  
				
				if (strlen($this->uri->segment(2))>0) { ?>
				&nbsp;&raquo;&nbsp;				
				<?php echo $name; } ?>
				
			</span>

		</div>

		<div id="content">