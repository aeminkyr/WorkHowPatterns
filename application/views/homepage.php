<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
	<?php $this->load->view("dependencies/css");
	$this->load->view("components/headelements");?>
	<style type="text/css">
		.navbar{
			background-color: white;
			color: black;
		}
		.card{
			background-color: #8DE4AF;
			transition: all 0.3s ease-in-out;
		}
		.listikon {
			display: none;


		}
		.card li:hover  .listikon {
			display: block;	

		}
		.card li:hover {
			transition: all 0.3s ease-in-out;
			background-color: #C3F6C0;
			border: 1px solid grey; 
			border-radius: 5px;
			padding:3px; 
		}
		.card li{
			font-family: 'Titillium Web';
			font-size: 18px;
		}
		i{
			cursor: pointer;
			text-decoration: none !important;
			border-bottom-style: none;
		}
		h4{
			font-family: 'Bowlby One SC';
		}
		.scroll {
			max-height:70vh;
			overflow-y: auto;
			margin-top: 15px;
			transition: .5s all 5s
		}
		::-webkit-scrollbar
		{
			width: 3px;
			background-color: #F5F5F5;			transition: .5s all 5s

		}
		::-webkit-scrollbar-thumb
		{
			border-radius: 10px;
			-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
			background-color: #555;			transition: .5s all 5s

		}
		.w3-blue{
			background: linear-gradient(339deg, rgba(8,192,255,1) 0%, rgba(90,255,164,1) 40%, rgba(25,15,52,1) 74%);
			color:black;
		}
	</style>
</head>
<body onload="addactive('home');">
	<?php 
	$this->load->view('components/navbar');?>
	<div class="container mt-4">
		<h2>Vortex For SM</h2>
		<small>Genel ilerleme</small>
		<div class="w3-light-grey w3-round-xlarge mb-2">
			<div class="w3-container w3-blue w3-round-xlarge" style="width:<?=$percent?>%"><?=$percent?>%</div>
		</div>
		<div class="row">
			<div class="col-md-4 scroll">
				<div class="card shadow mb-4">
					<div class="card-body p-3">
						<h4 class="mb-4" style="font-family: 'Bowlby One SC'; ">
							YETİMLER (<?=$count['c0']?>)<i class="fa fa-plus-circle float-right" aria-hidden="true" data-toggle="modal" data-target="#exampleModalCenter"></i>
						</h4>
						<ul class="list-unstyled">
							<?php foreach ($dbdata as $row) {
								?>
								<li class="mb-2"><?=$row->content;?> 
								<div class="edit pl-3">
									<div class="row">
										<a data-toggle="tooltip" data-placement="bottom" title="Sahiplen" href="<?=base_url('main/update/').$row->lists_id.'/1'?>"><i class="fa fa-heart listikon pr-1" aria-hidden="true"></i></a>
										<?php if($row->user_id== $_SESSION['id']){?>
											<a data-toggle="tooltip" data-placement="bottom" title="Sil" href="<?=base_url('main/delete/').$row->lists_id?>"><i class="fa fa-trash-o listikon" aria-hidden="true"></i></a>
										<?php } ?>
									</div>
								</div>
								<div align="right">
									<a class="" href="#"><small style="text-align: right; font-style: italic;"><?=$row->name?></small></a>
								</div>
							</li>
						<?php }?>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-4 scroll">
			<div class="card shadow mb-4">
				<div class="card-body p-3">
					<h4 class="mb-4">SAHİPLİLER (<?=$count['c1']?>)</h4>
					<ul class="list-unstyled">
						<?php foreach ($inprocess as $row) {
							?>
							<li class="mb-2" style=""><?=$row->content?>
							<div class="edit pl-3">
								<div class="row"> 
									<?php if($_SESSION['id']==$row->owner_id){ ?>
										<a data-toggle="tooltip" data-placement="bottom" title="Sil" href="<?=base_url('main/delete/').$row->lists_id?>"><i class="fa fa-trash-o listikon pr-2" aria-hidden="true"></i></a>
										<a data-toggle="tooltip" data-placement="bottom" title="Kavuştur" href="<?=base_url('main/update/').$row->lists_id.'/2'?>"><i class="fa fa-check-circle listikon pr-2" aria-hidden="true"></i></a>
										<a data-toggle="tooltip" data-placement="bottom" title="Sorunlulara gönder" href="<?=base_url('main/update/').$row->lists_id.'/3'?>"><i class="fa fa-exclamation-circle pr-2 listikon" aria-hidden="true"></i></a>
										<a data-toggle="tooltip" data-placement="bottom" title="Eski yerine koy" href="<?=base_url('main/update/').$row->lists_id.'/0'?>"><i class="fa fa-undo listikon" aria-hidden="true"></i></a>
									<?php }?>
								</div>
							</div>

							<div class="info">
								<a style="text-align: left;"><small><?=$row->update_date?></small></a>
							
								<a class=" float-right" href="#"><small style="text-align: right; font-style: italic;"><?=$row->name?></small></a>
							</div>
						</li>
					<?php }?>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-4 scroll">
		<div class="card shadow mb-4">
			<div class="card-body p-3">
				<h4 class="mb-4">KAVUŞANLAR (<?=$count['c2']?>)</h4>
				<ul class="list-unstyled">
					<?php foreach ($finished as $row) {
						?>
						<li class="mb-2" style=""><?=$row->content?>
						<div class="edit pl-3">
							<div class="row">
								<?php if($row->owner_id==$_SESSION['id']){ ?>
									<a href="<?=base_url('main/delete/').$row->lists_id?>"><i class="fa fa-trash-o listikon pr-2" aria-hidden="true"></i></a>
									<a href="<?=base_url('main/update/').$row->lists_id.'/3'?>"><i class="fa fa-exclamation-circle listikon" aria-hidden="true"></i></a>
								<?php } ?>
							</div>
						</div>
						<div align="right">
							<a class="" href="#"><small style="text-align: right; font-style: italic;"><?=$row->name?></small></a>
						</div>
					</li>
				<?php }?>
			</ul>
		</div>
	</div>
</div>
<div class="col-md-4 scroll">
	<div class="card shadow mb-4">
		<div class="card-body p-3">
			<h4 class="mb-4">Sorunlular (<?=$count['c3']?>)</h4>
			<ul class="list-unstyled">
				<?php foreach ($issues as $row) {
					?>
					<li class="mb-2" style=""><?=$row->content?>
					<div class="edit pl-3">
						<div class="row">
							<a href="<?=base_url('main/delete/').$row->lists_id?>"><i class="fa fa-trash-o listikon mr-2" aria-hidden="true"></i></a>
							<a data-toggle="tooltip" data-placement="bottom" title="Sahiplen" href="<?=base_url('main/update/').$row->lists_id.'/1'?>"><i class="fa fa-heart listikon pr-1" aria-hidden="true"></i></a>
						</div>
					</div>
				</li>
			<?php }?>
		</ul>
	</div>
</div>
</div>
</div>
<!--row-->
</div>
<?php $this->load->view("dependencies/js");
$this->load->view("components/modals");   ?>
<script type="text/javascript">
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
</script>
</body>
</html>