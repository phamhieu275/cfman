<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

// $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset('UTF-8'); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('jquery-ui','bootstrap.min','bootstrap-responsive.min', 'custom'));

		echo $this->Html->script(array('jquery-1.9.1.min', 'jquery-ui', 'bootstrap.min', 'highcharts'));
		
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<?php $logoUrl = ($this->name == 'Html') ? array('controller' => 'Html', 'action' => 'index') : '/';?>
	<div class="top-menu navbar navbar-fixed-top">
  		<div class="navbar-inner">
  			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				 
				<?php echo $this->Html->link(__('CafeMan'), $logoUrl, array('class' => 'brand'))?>
						 
				<?php echo $this->element('top_menu')?>
  			</div>
		</div>
	</div>
	<div class="container">
		<div id="header">
			<div>
				<?php
					echo $this->Html->link(
						$this->Html->image('sam-logo-inside.jpg', array('id' => 'brand-logo')),
						$logoUrl,
						array('escape' => false)
					);
				?>
			</div>
			<div class="header-info row-fluid">
				<div class="container">
					<ul class="breadcrumb">
						<?php if ($this->name == 'Html'):?>
							<li><a href="">Trang chủ</a> <span class="divider">/</span></li>
							<li><a href="#">Chức năng</a> <span class="divider">/</span></li>
							<li class="active">Data</li>
						<?php else:?>
							<?php echo $this->fetch('breadcrumbs')?>
						<?php endif;?>
					</ul>
				</div>
			</div>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<p>© Van Viet Cafe - 2013</p>
		</div>
	</div>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
