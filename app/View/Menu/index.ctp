<?php echo $this->start('breadcrumbs')?>
<li>
	<?php echo $this->Html->link(__('Trang chủ'), array('controller'=> 'users', 'action'=> 'dashboard'), array('escape'=> false))?>
	<span class="divider">&nbsp;&gt;</span>
</li>
<li class="active"><?php echo __('Thực đơn') ?></li>
<?php echo $this->end() ?>

<?php echo $this->element('setup_pager') ?>

<ul class="nav nav-tabs">
	<li class="active"><?php echo $this->Html->link(__('Danh sách'), array('controller'=> 'menu'))?></li>
</ul>
<div>
	<h4><?php echo __('Tìm kiếm') ?></h4>
	
	<?php echo $this->Form->create('Item', array('type'=> 'get', 'class'=> 'form-inline', 'inputDefaults'=> array('div'=> false, 'label'=> false), 'id'=> 'formItem'))?>
		<div style="margin: 10px 0px 10px 0; ">
			<?php echo $this->Form->select('category_id', $categories, array('value'=> (isset($_GET['category_id'])?$_GET['category_id']:'')))?>
			&nbsp;
			<?php echo $this->Form->input('name', array('value'=> (isset($_GET['name'])?$_GET['name']:''), 'placeholder'=> __('Tên / Tiếng Anh / Tiếng Pháp')))?>
		</div>
		
		<div style="margin: 10px 0px 10px 0; ">
			<?php echo $this->Form->input('cost_from', array('value'=> (isset($_GET['cost_from'])?$_GET['cost_from']:''), 'placeholder'=> __('Giá từ')))?> - 
			<?php echo $this->Form->input('cost_to', array('value'=> (isset($_GET['cost_to'])?$_GET['cost_to']:''), 'placeholder'=> __('Tới khoảng')))?>
			&nbsp;
			<button class="btn btn-warning"><i class="icon-search"></i>Tìm kiếm</button>
		</div>
	<?php echo $this->Form->end() ?>
</div>
<hr>
<div>
	<table class="table table-bordered table-striped menu-table">
		<thead>
			<tr>
				<th><?php echo __('STT') ?></th>
				<th><?php echo __('Loại') ?></th>
				<th width="75">&nbsp;</th>
				<th><?php echo __('Tên') ?></th>
				<th><?php echo __('Tên Tiếng Anh') ?></th>
				<th><?php echo __('Tên Tiếng Pháp') ?></th>
				<th><?php echo __('Đơn Giá') ?></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$typeOptions = array('1'=> __('Đồ ăn'), 2=> __('Đồ uống'));
			$params = $this->Paginator->params();
			$i = ($params['page'] - 1)*$params['limit'] + 1;
			?>
			<?php foreach ($items as $k=> $item): ?>
			<tr>
				<td><?php echo $i + $k ?></td>
				<td><?php echo h($typeOptions[$item['Item']['type']])?></td>
				<th><?php if(!empty($item['Item']['image'])){
					echo $this->Html->image('menu/'.$item['Item']['image'], array('style'=> 'width:75px;height:75px'));
				}else{
					echo $this->Html->image('75x75.gif', array('style'=> 'width:75px;height:75px'));
				}?>
				<td><?php echo $this->Html->link(h($item['Item']['name1']), array('controller'=> 'menu', 'action'=> 'edit', $item['Item']['id']), array('escape'=> false))?></td>
				<td><?php echo h($item['Item']['name2'])?></td>
				<td><?php echo h($item['Item']['name3'])?></td>
				<td><?php echo $this->Number->currency($item['Item']['cost'], ' VND', array('wholePosition' => 'after', 'places' => 0, 'thousands' => '.', 'decimals' => ','))?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
 
<?php echo $this->element('pager') ?>
<script type="text/javascript">
$('#formItem').submit(function() {
	$('#formItem input, #formItem select').each(function(){
		if($(this).val() === ''){
			$(this).attr('name','');
		}
	});
});
</script>