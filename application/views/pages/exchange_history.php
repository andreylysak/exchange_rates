<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="page">
	<main role="main" class="flex-shrink-0">
		<div class="container">
			<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
				<h1 class="display-4">History</h1>
				<p class="lead">Exchange history past 1 month</p>
			</div>
			<table class="table">
				<thead class="thead-light">
					<tr>
						<th scope="col">#</th>
						<th scope="col">USD</th>
						<th scope="col">EUR</th>
						<th scope="col">UAH</th>
						<th scope="col">date</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$index = 1;
						foreach($exchange as $item) {
							$html = '
							<tr>
								<th scope="row">'.$index.'</th>
								<td><p>$1 <span class="text-muted">= '.$item['usd'].' uah</span></p></td>
								<td><p>€1 <span class="text-muted">= '.$item['eur'].' uah</span></p></td>
								<td><p>₴1 <span class="text-muted">= '.$item['uah'].' usd</span></p></td>
								<td><p>'.$item['date'].'</p></td>
							</tr>
							';
							echo $html;
							$index++;
						}
					?>
				</tbody>
			</table>
		</div>
	</main>
</div>
