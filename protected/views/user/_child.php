<p id="subsectionheading">timespan linked to the above selected user</p>
<div class="hint">(Please note: If no user is selected, the Permissions of the top-most user are displayed.)</div>

<?php
    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'child-grid',
    'dataProvider'=>$child_model->searchIncludingPermissions($parentID),
    'filter'=>$child_model,
    'columns'=>array(
        'permission_id',
        array(
            'name'=>'permission_desc_param',
            'value'=>'($data->relPermission)?$data->
                relPermission->permission_desc:""', /* Test for
                empty related fields not to crash the program */
            'header'=>'Permission Description',
            'filter' => CHtml::activeTextField($child_model,
            'permission_desc_param'),
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'viewButtonUrl' => 'array("rolepermission/view",
            "id"=>$data->permission_id)',
            'updateButtonUrl' => 'array("rolepermission/update",
            "id"=>$data->permission_id)',
            'deleteButtonUrl' => 'array("rolepermission/delete",
            "id"=>$data->permission_id)',
        ),
    ),
));
?>