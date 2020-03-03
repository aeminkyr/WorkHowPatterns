<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
	<?php $this->load->view("dependencies/css");
	$this->load->view("components/headelements");?>
</head>
<body onload="addactive('crew');">
	<?php $this->load->view('components/navbar');?>
	<div class="container" style="height: 100vh;">
		<div class="row">
			<?php foreach ($userdata as $row) {
				$data = $this->Crew_model->load_list($row->user_id)
				?>
				<div class="col-md-4 scroll">
					<div class="card shadow mb-4">
						<div class="card-body p-3">
							<h4 class="mb-4"><?=$row->name?> <?php if($row->davet==0){ ?> <i class="fa fa-check float-right" style="color: green;" title="Üyeliği aktif!" aria-hidden="true"></i><?php } ?></h4>
							<hr>
							<ul class="list-unstyled">
								<?php foreach ($data as $row2) {?>
									<li class="mb-2" style="">
										<?=$row2->content;?>
										<?php if($row2->whichlist==2){?>
											<i class="fa fa-check-circle float-right" aria-hidden="true"></i>
										<?php }?>
										<?php if($row2->whichlist==1){?>
											<i class="fa fa-hourglass-start float-right" aria-hidden="true"></i>
										<?php }?>
										<?php if($row2->whichlist==3){?>
											<i class="fa fa-exclamation-circle float-right" aria-hidden="true"></i>

										<?php }?>

										<div align="right" class="listikon">
											<a class="" href="#"><small style="text-align: right; font-style: italic;"><?=$row2->update_date?></small></a>
										</div>
									</li>
								<?php	}?>

							</ul>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php $this->load->view("dependencies/js");?>
</body>
</html>