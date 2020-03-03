<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
	<?php $this->load->view("dependencies/css");
	$this->load->view("components/headelements"); ?>
	<style type="text/css">
		<style type="text/css">
		.container {
			width: 600px;
			margin: 100px auto; 
		}
		.progressbar {
			counter-reset: step;
		}
		.progressbar li {
			list-style-type: none;
			width: 25%;
			float: left;
			font-size: 12px;
			position: relative;
			text-align: center;
			text-transform: uppercase;
			color: #7d7d7d;
		}
		.progressbar li:before {
			width: 30px;
			height: 30px;
			content: counter(step);
			counter-increment: step;
			line-height: 30px;
			border: 2px solid #7d7d7d;
			display: block;
			text-align: center;
			margin: 0 auto 10px auto;
			border-radius: 50%;
			background-color: white;
		}
		.progressbar li:after {
			width: 100%;
			height: 2px;
			content: '';
			position: absolute;
			background-color: #7d7d7d;
			top: 15px;
			left: -50%;
			z-index: -1;
		}
		.progressbar li:first-child:after {
			content: none;
		}
		.progressbar li.active {
			color: red;
		}
		.progressbar li.active:before {
			border-color:red;
		}
		.progressbar li.active + li:after {
			background-color: red;
		}

		
	</style>
</style>
</head>
<body onload="addactive('dead');">
	<?php $this->load->view('components/navbar');?>
	<div style="height: 100vh">
		<div class="container">
			<div class="row mb-3 mt-4">
				<div class="col">
					<ul class="progressbar" style="margin-right: 50px;">
						<li class="active" >Başvuru</li>
						<li>Ön Tasarım Raporu</li>
						<li>EĞİTİM ve Soru Cevap</li>
						<li>Kıritik Tasarım Raporu</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="container ">
			
			<div class="alert alert-danger" role="alert">
				<h2 class="display-6" style="font-size: 18px;">Sonraki aşama: Ön Tasarım Raporu<br> Kalan zaman: <span style="color:red;"><?=$timeleft['days']?> gün <?=$timeleft['hours']?> saat</span><br>Tarih: 20 MART 2020</h2>
			</div>

			<div class="accordion" id="accordionExample">
				
				<div class="card">
					

					<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color: black; text-align: left;">
						Yarışma Programı <i class="fa fa-chevron-down" aria-hidden="true"></i>

					</button>

					

					<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body">

							<table class="table table-hover table-responsive">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Tarih</th>
										<th scope="col">Açıklama</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">1</th>
										<td>20 Mart 2020 </td>
										<td>Ön Tasarım Raporu Son Teslim Tarihi</td>
									</tr>
									<tr>
										<th scope="row">2</th>
										<td>13 Nisan 2020 </td>
										<td>Ön Tasarım Raporu Sonuçlarına göre Ön Elemeyi Geçen ve Maddi Destek Almaya Hak Kazanan Takımların Açıklanması</td>
									</tr>
									<tr>
										<th scope="row">3</th>
										<td>08-09 Mayıs 2020</td>
										<td>Eğitim Verilmesi ve Soru Cevap Etkinliği</td>
									</tr>
									<tr>
										<th scope="row">4</th>
										<td>3 Temmuz 2020</td>
										<td>Kritik Tasarım Raporu Son Teslim Tarihi</td>
									</tr>
									<tr>
										<th scope="row">5</th>
										<td>14 Ağustos 2020</td>
										<td>Sualtı Araçlarının Sızdırmazlık ve Hareket Kabiliyeti Videolarının Son Teslim Tarihi</td>
									</tr>
									<tr>
										<th scope="row">6</th>
										<td>21 Ağustos 2020</td>
										<td>Finale Kalan Takımların Açıklanması</td>
									</tr>
									<tr>
										<th scope="row">7</th>
										<td>22-27 Eylül 2020</td>
										<td>Yarışma Tarihi</td>
									</tr>

								</tbody>
							</table>





						</div><!--CARD BODY-->
					</div>
				</div>

				<div class="card">
					<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSec" aria-expanded="true" aria-controls="collapseSec" style="color: black; text-align: left;">
						Yarışma Şartnamesi <i class="fa fa-chevron-down" aria-hidden="true"></i>
					</button>
					<div id="collapseSec" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body">
							<iframe src='https://docs.google.com/gview?url=<?=base_url('upload/sartname.pdf')?>&embedded=true' width='100%' style="height: 80vh;" frameborder='0'>
								</iframe>
							</div><!--CARD BODY-->
						</div>
					</div> <!---CAR--->
					<div class="card">
						<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="true" aria-controls="collapse3" style="color: black; text-align: left;">
							Ön tasarım şablonu <i class="fa fa-chevron-down" aria-hidden="true"></i>
						</button>
						<div id="collapse3" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
							<div class="card-body">
								<iframe src='https://docs.google.com/gview?url=<?=base_url('upload/ontasarimsablonu.docx')?>&embedded=true' width='100%' style="height: 80vh;" frameborder='0'>
								</iframe>
							</div><!--CARD BODY-->
						</div>
					</div> <!---CAR--->



				</div><!--ACCORDION CLASS--->



			</div>


			<?php $this->load->view("dependencies/js");?>
		</body>
		</html>