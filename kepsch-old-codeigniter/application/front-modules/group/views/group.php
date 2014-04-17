
			<table id="days">
				<tr>
				<?php if (!empty($sch)) : ?>

				<?php for ($d=1; $d<=5; $d++ ) : ?>

					<td>
						<div class="day"><span><?php $days = $this->config->item('days'); echo $days[$d];  ?></span></div> 

						<?php if (!empty($sch[$d])) : ?>
						<?php foreach ($sch[$d] as $n => $number): ?>

							<div class="primary"><span><?php echo $n; ?>.&nbsp;</span><?php echo $number['lesson']['name']; ?></div> 
							<?php foreach ($number['teachers'] as $teacher) : ?>
								<div class="secondary"><a title="<?php echo $teacher['surname'].' '; if (!empty($teacher['name'])) { echo $teacher['name'].' '.$teacher['second_name']; } else { echo $teacher['initials'];  } ?>" href="<?php echo base_url().'teacher/'.$teacher['id']; ?>"><?php echo $teacher['surname'].' '.$teacher['initials']; ?></a></div>
							<?php endforeach; ?>
							<div class="cabinet">
							<?php  echo (!array_key_exists(0, $number['auds'])) ?  implode(', ', $number['auds']) : '&nbsp;'; ?>
							</div>

						<?php endforeach; ?>
						<?php else: ?>
							<div class="nothing"><?php echo $this->config->item('nothing'); ?></div>
						<?php endif; ?>
					</td>

				<?php endfor; ?>



				<?php else: ?>
					<div class="nothing"><?php echo $this->config->item('nothing_group'); ?></div>
				<?php endif; ?>
				</tr>
			</table>