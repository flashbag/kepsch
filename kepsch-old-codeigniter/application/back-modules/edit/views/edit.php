
		<?php echo form_open('admin/edit/verify'); ?>
		<?php echo form_hidden('id',$id); ?>

			<table class="edit">
				<tr><td colspan="2">&nbsp;
				<?php if ($this->session->flashdata('info')) : ?>
				<tr><td colspan="2" class="center" style="border: 1px solid #000;" class="info">
				<?php echo $this->session->flashdata('info'); ?>
				<tr><td colspan="2">&nbsp;
				<?php endif; ?>
			
				<tr><td class="etitle"><div class="edit_info">Редагування розкладу групи <?= $group ?></div>
					<td class="r"><?php echo form_dropdown('status',$status,$info['status'],'float="left"'); ?>
					
				<tr>						
					<td class="l"><span><?php if (strlen($info['updated_by'])>1) { echo 'оновлено '.$info['updated_by'].' @ '. $info['updated_time']; } else { echo 'ще не оновлювався'; } ?></span>					
					<td>&nbsp;

			</table>

			<table class="edit" border="0">
				
				<?php for ($d=1; $d<=count($this->config->item('days')); $d++) : ?>
					<tr><td colspan="7">&nbsp;
					<?php $tr1_display='none'; $tr2_display='none'; ?>
					<tr> 
						<td class="etitle" colspan="6"><?= $days[$d] ?>				
					
					<?php $nn = 1;  ?>

					<?php if (array_key_exists($d, $sch)) : ?>

						<?php foreach ($sch[$d] as $n => $num) : ?>

							<?php foreach ($num as $r) : ?>

							<?php 

							$tr1_display = (!empty($r['a'][2]) || !empty($r['t'][2])) ? 'table-row' : 'none' ; 
							$tr2_display = (!empty($r['a'][3]) || !empty($r['t'][3])) ? 'table-row' : 'none' ; 

							?>

							<tr>
								<td><?php echo form_dropdown("number[$d][$nn]",$numbers,$r['n']); ?>
								<td><?php echo form_dropdown("lesson[$d][$nn]",$lessons,$r['l']); ?>
								<td><?php echo form_dropdown("week[$d][$nn]",$weeks,$r['w']); ?>
								<td><?php echo form_dropdown("aud[$d][$nn][1]",$auds,$r['a'][1]); ?>
								<td><?php echo form_dropdown("teacher[$d][$nn][1]",$teachers,$r['t'][1]); ?>
						
								<td class="add">
									<a href="javascript:ReverseDisplay('tr1<?php echo '_'.$d.'_'.$nn; ?>')">1</a>
									<a href="javascript:ReverseDisplay('tr2<?php echo '_'.$d.'_'.$nn; ?>')">2</a>
							
							<tr id="tr1<?php echo '_'.$d.'_'.$nn; ?>" style="display: <?php echo $tr1_display; ?>" class="big">
								<td>
								<td>
								<td>
								<td><?php echo form_dropdown("aud[$d][$nn][2]", $auds,$r['a'][2]); ?>
								<td><?php echo form_dropdown("teacher[$d][$nn][2]",$teachers,$r['t'][2]); ?>
								<td class="add">1

							<tr id="tr2<?php echo '_'.$d.'_'.$n; ?>" style="display: <?php echo $tr2_display; ?>" class="big">
								<td>
								<td>
								<td>
								<td><?php echo form_dropdown("aud[$d][$nn][3]", $auds,$r['a'][3]); ?>
								<td><?php echo form_dropdown("teacher[$d][$nn][3]",$teachers,$r['t'][3]); ?>
								<td class="add">2
							
							<?php endforeach; ?>
							<?php $nn++; ?>

						<?php endforeach; ?>

						<?php endif; ?>

						<?php $mm = $nn; for($e=1; $e<=$this->config->item('pars')-$nn+1; $e++) : ?>

							<tr>		
								<td><?php echo form_dropdown("number[$d][$mm]",$numbers,0); ?>
								<td><?php echo form_dropdown("lesson[$d][$mm]",$lessons,0); ?>
								<td><?php echo form_dropdown("week[$d][$mm]",$weeks,0); ?>
								<td><?php echo form_dropdown("aud[$d][$mm][1]",$auds,0); ?>
								<td><?php echo form_dropdown("teacher[$d][$mm][1]",$teachers,0); ?>

								<td class="add">
									<a href="javascript:ReverseDisplay('tr1<?php echo '_'.$d.'_'.$mm; ?>')">1</a>
									<a href="javascript:ReverseDisplay('tr2<?php echo '_'.$d.'_'.$mm; ?>')">2</a>
							

							<tr id="tr1<?php echo '_'.$d.'_'.$mm; ?>" style="display: none" class="big">
								<td>
								<td>
								<td>
								<td><?php echo form_dropdown("aud[$d][$mm][2]", $auds,0); ?>
								<td><?php echo form_dropdown("teacher[$d][$mm][2]",$teachers,0); ?>
								<td class="add">1
							

							<tr id="tr2<?php echo '_'.$d.'_'.$mm; ?>" style="display: none" class="big">
								<td>
								<td>
								<td>
								<td><?php echo form_dropdown("aud[$d][$mm][3]", $auds,0); ?>
								<td><?php echo form_dropdown("teacher[$d][$mm][3]",$teachers,0); ?>
								<td class="add">2
							
						<?php $mm++; endfor; ?>

					<tr><td colspan="7">&nbsp;

				<?php endfor; ?>
				<tr>
					<td class="ok" colspan="7"><input type="submit" value="нехай буде так"/>
				
				<tr><td colspan="7">&nbsp;
			</table>															