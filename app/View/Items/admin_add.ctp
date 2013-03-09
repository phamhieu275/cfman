<ul class="nav nav-tabs">
	<li><?php echo $this->Html->link(__('Danh sách'), '/admin/menu')?></li>
	<li class="active"><?php echo $this->Html->link(__('Thêm mới'), '/admin/menu-add')?></li>
</ul>
<div>
	<h4><?php echo __('Thêm mới thực đơn') ?></h4>
	<br>
	<?php echo $this->Form->create('Item', array('class'=> 'form-horizontal', 'inputDefaults'=> array('label'=> false, 'div'=> false)))?>
		<div class="row-fluid">
			<div class="span6 new-item-info">
				<div class="control-group">
					<label class="control-label"><?php echo __('Loại đồ dùng') ?></label>
					<div class="controls"><?php echo $this->Form->input('type', array(
						'type'=> 'radio',
						'legend'=> false,
						'options'=> array('1'=> __('Đồ ăn'), 2=> __('Đồ uống')),
						'div'=> 'input radio',
						'label'=> 'radio inline'
					))?></div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Loại sản phẩm') ?></label>
					<div class="controls">
						<?php echo $this->Form->select('category_id', $categories, array('empty'=> __('-- Chọn loại sản phẩm --')))?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Tên sản phẩm') ?></label>
					<div class="controls">
						<?php echo $this->Form->input('name1', array('placeholder'=> __('Tên sản phẩm'))) ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Tên Tiếng Anh') ?></label>
					<div class="controls">
						<?php echo $this->Form->input('name2', array('placeholder'=> __('Tên Tiếng Anh'))) ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Tên Tiếng Pháp') ?></label>
					<div class="controls">
						<?php echo $this->Form->input('name3', array('placeholder'=> __('Tên Tiếng Pháp'))) ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Giá Thành') ?></label>
					<div class="controls">
						<?php echo $this->Form->input('cost', array('placeholder'=> __('Giá sản phẩm')))?>
					</div>
				</div>
			</div>
			<div class="span6 new-item-image">
				<h5>Hình đại diện sản phẩm</h5>
				<img data-src="holder.js/140x140" class="img-polaroid center-div" style="width: 140px; height: 140px;">
				<input type="file" style="display: block; margin: 0 auto;">
			</div>
		</div>
		<hr>
		<div class="control-group">
			<div class="controls">
				<div class="controls">
					<?php echo $this->Form->button(__('Tạo sản phẩm'), array('class'=> 'btn btn-primary'))?>
					<?php echo $this->Html->link('Reset', '/admin/menu-add', array('class'=> 'btn'))?>
				</div>
			</div>
		</div>
	</form>
</div>