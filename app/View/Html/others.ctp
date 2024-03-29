<?php echo $this->Html->scriptStart();?>
$(document).ready(function() {
	$('#new-supplier').click(function(e) {
		$('#modal-new-supplier').modal();
	});
});
<?php echo $this->Html->scriptEnd();?>

<ul class="nav nav-tabs">
	<li class="active"><?php echo $this->Html->link('Nhà cung cấp', array('action' => 'others'))?></li>
	<li><?php echo $this->Html->link('Khách hàng', array('action' => 'others_customer'))?></li>
</ul>

<h4>Quản lý Nhà cung cấp</h4>
<br>

<div style="margin-bottom: 5px;">
	<button class="btn btn-info" id="new-supplier"><i class="icon-white icon-plus-sign"></i>Thêm mới</button>
</div>
<div>
	<table class="table table-bordered table-striped menu-table">
		<thead>
			<tr>
				<th>Tên NCC</th>
				<th>Loại sản phẩm</th>
				<th>Số DT</th>
				<th>Ghi chú</th>
				<th>Thao tác</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Anh Béo</td>
				<td>Hoa quả</td>
				<td>01229695294</td>
				<td></td>
				<td>
					<a href="javascript:void(0)" class="pull-left"><i class="icon-edit"></i> Sửa</a>
					<a href="javascript:void(0)" class="pull-right"><i class="icon-trash"></i> Xóa</a>
				</td>
			</tr>
			<tr>
				<td>Anh Còi</td>
				<td>Thuốc Lá</td>
				<td>0905563299</td>
				<td></td>
				<td>
					<a href="javascript:void(0)" class="pull-left"><i class="icon-edit"></i> Sửa</a>
					<a href="javascript:void(0)" class="pull-right"><i class="icon-trash"></i> Xóa</a>
				</td>
			</tr>
			<tr>
				<td>Chị Tươi</td>
				<td>Thực phẩm</td>
				<td>043563244</td>
				<td></td>
				<td>
					<a href="javascript:void(0)" class="pull-left"><i class="icon-edit"></i> Sửa</a>
					<a href="javascript:void(0)" class="pull-right"><i class="icon-trash"></i> Xóa</a>
				</td>
		</tbody>
	</table>
</div>


<div id="modal-new-supplier" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="modalNewSupplier" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="modalNewSupplier">Thêm nhà cung cấp mới</h3>
	</div>
	<form class="form-horizontal">
		<div class="modal-body">
				<div class="control-group">
					<label class="control-label">Loại sản phẩm</label>
					<div class="controls">
						<select>
							<option>Hoa quả, Rượu, Thuốc ...</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="ten">Tên nhà cung cấp</label>
					<div class="controls">
						<input type="text" id="ten" placeholder="Tên nhà cung cấp">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="lienlac">SDT Liên lạc</label>
					<div class="controls">
						<input type="text" id="lienlac" placeholder="SDT Liên lạc">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="note">Ghi chú</label>
					<div class="controls">
						<textarea rows="2" cols="2" placeholder="Ghi chú thêm" id="note"></textarea>
					</div>
				</div>
		</div>
		<div class="modal-footer">
			<button class="btn btn-success" data-dismiss="modal">Thực hiện</button>
			<button class="btn" type="reset">Làm lại</button>
		</div>
	</form>
</div>