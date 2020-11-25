<?php if($this->session->flashdata('success')){?>
	<div class="alert alert-success text-center"><?php echo $this->session->flashdata('success'); ?></div>
<?php };?>
<div class="container">&nbsp;

	<div class="card" style="width: 100%">

		<div class="card-header">
<!--			--><?php //echo count($orders);?>
			<div class="col">
				<b>Your orders :</b>
				<a class="btn btn-success  mr-1  btn-sm  float-right" href="<?php echo site_url('home');?>">Continue Shopping</i></a>
			</div>
		</div>
		<div class="card-body">
			<!--		@include('inc.feedback')-->

			<?php if (isset($orders) && !empty($orders))  { ?>

				<table class="table">
					<thead class="thead-dark">
					<tr>
						<th scope="col">#</th>
						<th scope="col">Image</th>
						<th scope="col">Product name</th>
						<th scope="col">Product description</th>
						<th scope="col">Product price </th>
						<th scope="col">Product quantity </th>
						<th scope="col">Order date</th>
						<th scope="col">Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php foreach ($orders as $key =>$order) {?>

						<tr>
							<th scope="row">
								<?php echo $key+1; ?>
							</th>
							<td>image</td>
							<td><?php echo $order['name']; ?></td>
							<td><?php echo $order['description']; ?></td>
							<td><?php echo $order['price']; ?></td>
							<td>x <b><?php echo $order['quantity']; ?></b></td>

							<td>
								Not Implemented Yet
							</td>

							<td>
								<div class="row">
									<!--					<div class="col">-->
									<!--						<a class="btn btn-secondary mr-1  btn-sm " href="--><?php //echo site_url('products/edit/'.$order['id']);?><!--">View</i></a>-->
									<!--					</div>-->
									<div class="col">
										<a class="btn btn-info mr-1  btn-sm " href="<?php echo site_url('products/edit/'.$order['id']);?>">Update Quantity</i></a>

									</div>	<div class="col">

										<a class="btn btn-danger mr-1  btn-sm " onclick="return confirm('Are you sure ?')" href="<?php echo site_url('customer/orders/delete/'.$order['id']);?>">Cancel</i></a>

									</div>
								</div>
							</td>
						</tr>
					<?php } ?>
					</tbody>
				</table>

			<?php } else {?>

				<h3 class="text-center"> You have No Orders Yet</h3>
			<?php } ?>
		</div>
