<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="page">
	<main role="main" class="flex-shrink-0">
		<div class="container">
			<div class="py-3 pt-md-5 pb-md-4 mx-auto text-center">
				<h1 class="display-4">Excange rate</h1>
				<p class="lead">Enter currency value</p>
				<div class="flash-error-box">
					<?php
						if (isset($_SESSION["flash_error"])) {
							echo '<div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
							'.$_SESSION["flash_error"].'
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							</div>';
							unset($_SESSION['flash_error']);
						}
					?>
				</div>
				<div class="convert-form">
					<form action="<?php echo prep_url(site_url('home/convert'));?>" method="post">
						<div class="form-row align-items-center">
							<div class="col">
								<label class="sr-only" for="curencyFormInput">Amount</label>
								<input type="text" name="amount" class="form-control mb-2" id="curencyFormInput">
							</div>
							<div class="col-auto my-1">
								<div class="form-group mb-2">
									<label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Currency</label>
									<select name="currency" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
										<option value="usd" selected="">USD</option>
										<option value="eur">EUR</option>
										<option value="uah">UAH</option>
									</select>
								</div>
							</div>
							<div class="col-auto">
								<button type="submit" class="btn btn-primary mb-2">Convert</button>
							</div>
						</div>
					</form>
				</div>
				<?php
					if (isset($_SESSION["flash_result"])) {
						echo '
						<div class="convert-result">
							<p>'.$_SESSION['flash_result'].'</p>
						</div>
						';
						unset($_SESSION['flash_result']);
					}
				?>
			</div>
			<div class="card-deck mb-3 text-center">
				<div class="card mb-4 shadow-sm">
					<div class="card-header">
						<h4 class="my-0 font-weight-normal">USD</h4>
					</div>
					<div class="card-body">
						<h1 class="card-title pricing-card-title">$1 <span class="text-muted">= ₴<?php echo $excange_usd; ?></span></h1>
						<ul class="list-unstyled mt-3 mb-4">
							<li>Last update: <span><?php echo $excange_last_update_date; ?></span></li>
						</ul>
					</div>
					</div><div class="card mb-4 shadow-sm">
					<div class="card-header">
						<h4 class="my-0 font-weight-normal">EUR</h4>
					</div>
					<div class="card-body">
						<h1 class="card-title pricing-card-title">€1 <span class="text-muted">= ₴<?php echo $excange_eur; ?></span></h1>
						<ul class="list-unstyled mt-3 mb-4">
							<li>Last update: <span><?php echo $excange_last_update_date; ?></span></li>
						</ul>
					</div>
					</div><div class="card mb-4 shadow-sm">
					<div class="card-header">
						<h4 class="my-0 font-weight-normal">UAH</h4>
					</div>
					<div class="card-body">
						<h1 class="card-title pricing-card-title">₴1 <span class="text-muted">= $<?php echo $excange_uah; ?></span></h1>
						<ul class="list-unstyled mt-3 mb-4">
							<li>Last update: <span><?php echo $excange_last_update_date; ?></span></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="all-exchange">
				<p>
					<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
						All excange
					</button>
				</p>
				<div class="collapse" id="collapseExample">
					<div class="card card-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Currency name</th>
									<th scope="col">Rate</th>
									<th scope="col">CC</th>
									<th scope="col">Date</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$index = 1;
									foreach($exchange as $item) {
										$html = '
										<tr>
											<th scope="row">'.$index.'</th>
											<td>'.$item->txt.'</td>
											<td>'.$item->rate.'</td>
											<td>'.$item->cc.'</td>
											<td>'.$item->exchangedate.'</td>
										</tr>
										';
										echo $html;
										$index++;
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</main>
</div>