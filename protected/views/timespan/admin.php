<?php
/* @var $this TimespanController */
/* @var $model Timespan */

$this->breadcrumbs = array(
    'Timespans' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Timespan', 'url' => array('index')),
    array('label' => 'Create Timespan', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#timespan-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Timespans</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'timespan-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        array(// display 'create_time' using an expression
            'name' => 'timespan_in',
            'value' => array($this, 'gridInColumn'),
        ),
        array(// display 'create_time' using an expression
            'name' => 'timespan_out',
            'value' => array($this, 'gridOutColumn'),
        ),
        array(// display 'create_time' using an expression
            'name' => 'timespan_time',
            'value' => array($this, 'gridTimeColumn'),
        ),
        array(
            'name' => 'user',
            'value' => '$data->user->username'),

            'project_id',
        /*
          'task_id',
          'timespan_comment',
          'timespan_comment_type',
          'timespan_cleared',
         */
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
?>
