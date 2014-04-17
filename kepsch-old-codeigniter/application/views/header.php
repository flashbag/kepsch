		<div id="header">

			<h1>розклад</h1>

			<div id="right">

				<?php  
				
				$needle = $this->uri->segment(1);

				if ($needle == 'group' || $needle = 'teacher') : 
				$id = $this->uri->segment(2);
				

				for ($w=1; $w<=4; $w++) :
					if ($week == $w) { $c = ' class ="week"'; } else { $c = ''; } ?>
					<h3><?php echo anchor($needle.'/'.$id.'/'.$w,$w,$c); ?> </h3>
					<?php 
				endfor;

				endif;  ?>

				<h3>&nbsp;</h3><h3>&nbsp;</h3>
				<h3><a href="http://vk.com/kepsch" target="_blank">вк</a></h3>
			</div>

		</div>