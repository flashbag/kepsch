<?php
/* @var $this SpecController */
/* @var $model Spec */

$pagesize =Yii::app()->params['pagesize'];
$pages = ceil($count/$pagesize);
$current = (isset($_GET[$model->modelClass().'_page'])) ? $_GET[$model->modelClass().'_page'] : 1 ;

?>




<div class="row">
	<div class="col-lg-12">
		<div class="col-lg-6">
			<h1 class="model_title"><?= $model->modelName(); ?></h1>								
		</div>
		<div class="col-lg-6">								
			<p class="pull-right" style="display: block; margin-top: 4%;">
				<a href="<?php echo Yii::app()->controller->createUrl('/spec/spec/create'); ?>" class="btn btn-primary btn-lg">Додати</a>
			</p>									
		</div>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="alert alert-dismissable alert-' . $key . '">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' . $message . "</div>\n";
    }
?>		
	</div>
</div>




<div class="row">
	<div class="col-lg-12">
		<div style="font-size: 150%;">
			<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'spec-grid',
				'itemsCssClass' => 'table table-striped table-bordered table-hover table-custom',
				'dataProvider'=>$model->search(),
				'enablePagination' => false,
				'enableSorting' => false,
					//'summaryText' => '{start}-{end} з {count}',
				'summaryText' => '',
					//'filter'=>$model,
					//'hideHeader' => true,
				'columns'=>array(
					array(
						'id' => 'code',
						'name' => 'code',
						'htmlOptions' => array(
							'class' => 'cdatacolumn',
							'style' => 'text-align: center;'
							),
						),
					array(
						'id' => 'name',
						'name' => 'name',
						'htmlOptions' => array(
							'style' => 'width:50%',
							),
						),

					/*

					array(
						'id' => 'description',
						'name' => 'description',
						'htmlOptions' => array(
							'style' => 'width:30%',
							),
						),
					*/
					array(

						'id' => 'status',
						'name' => 'status',
						'type' => 'raw',
						'value' => '($data->status == "0") ? Yii::app()->params["statuses"]["0"] : Yii::app()->params["statuses"]["1"]',					
						//'value' => "Yii::app()->params['statuses'][$data->status]",
						'htmlOptions' => array(
                    				'style' => 'width:14%',
							),
						),

					array(
						'name'=>'view',
						'type'=>'raw',
						'header' => '',
						'htmlOptions' => array(
							'class' => 'cdatacolumn',
							),
						'value'=>'CHtml::link("Переглянути", array("/spec/spec/view", "id"=>$data->id), array("class"=>"btn btn-default"))',
						),

					array(

						'name'=>'view',
						'type'=>'raw',
						'header' => '',
						'htmlOptions' => array(
							'class' => 'cdatacolumn',
							),
						'value'=>'CHtml::link("Редагувати", array("/spec/update", "id"=>$data->id), array("class"=>"btn btn-default"))',
						),


					array(

						'name'=>'view',
						'type'=>'raw',
						'header' => '',
						'htmlOptions' => array(
							'class' => 'cdatacolumn',
							),
						'value'=>'CHtml::link("Видалити", array("/spec/delete", "id"=>$data->id), array("class"=>"btn btn-default", "confirm" => "Ви впевнені що хочете зробити цю операцію?"))',
						'visible' => Yii::app()->user->isAdmin(),
					),



					),
					)); ?>
				</div>

			</div>
		</div>

		<div class="row" style="margin-bottom: 3%;">

			<div class="col-lg-6 ">			
				
				<a class="btn btn-default btn-lg"><?= Yii::app()->params['total'] ?> <?= $count ?></a>
			</div>

			
			<div class="col-lg-6 ">				
				<?php if ($pages>1): ?>
 				<ul class="pagination  pagination-lg pull-right" style="margin: 0">

					<?php for($p=1;$p<=$pages; $p++): ?>
					<li <?php if ($p==$current) echo 'class="active"'; ?>><a href="<?php echo str_replace('module/', '', Yii::app()->createUrl('spec/page/'.$p)); ?>"><?=$p?></a></li>
					<?php endfor; ?>
				</ul>
				<?php endif; ?>

			</div>
			
		</div>





