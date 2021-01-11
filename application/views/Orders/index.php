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
<!--					<th scope="col">Order date</th>-->
						<th scope="col">Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php $total = 0;  ?>
					<?php foreach ($orders as $key =>$order) {?>

						<tr>
							<th scope="row">
								<?php echo $key+1; $total = $total+$order['price']* $order['quantity'];  ?>
							</th>
							<td><img src="<?php echo base_url('assets/images/products/'.$order['image']);?>" alt="image" height="40px" width="50px"></td>
							<td><?php echo $order['name']; ?></td>
							<td><?php  echo
								strlen($order['description'])>15? substr($order['description'],0,15). '...':$order['description']

							?>
							</td>
							<td><?php echo $order['price']; ?></td>
							<td>
<!--								--><?php //if($order['quantity']>1) { ?>
								<a href="<?php echo site_url('quantity/remove/one/'.$order['id'])?>" type="button" class="btn<?php echo $order['quantity']>1 ? '':' disabled'?>" >
								<i style="font-size:24px" class="fa fa-angle-left"></i>
								</a>
<!--								--><?php //}?>
									<b>
									x<?php echo $order['quantity'];  ?>
								</b>

								<a href="<?php echo site_url('quantity/add/one/'.$order['id'])?>" type="button" class="btn">
									<i style="font-size:24px" class="fa fa-angle-right"></i>
								</a>


							</td>

<!--							<td>-->
<!--								Not Implemented Yet-->
<!--							</td>-->

							<td>
								<div class="row">
									<!--					<div class="col">-->
									<!--						<a class="btn btn-secondary mr-1  btn-sm " href="--><?php //echo site_url('products/edit/'.$order['id']);?><!--">View</i></a>-->
									<!--					</div>-->
<!--									<div class="col">-->
<!--										<a class="btn btn-info mr-1  btn-sm " href="--><?php //echo site_url('products/edit/'.$order['id']);?><!--">Update Quantity</i></a>-->
<!---->
<!--									</div>	-->
									<div class="col">

										<a class="btn mr-1  btn-sm " onclick="return confirm('Are you sure ?')" href="<?php echo site_url('customer/orders/delete/'.$order['id']);?>"><i class="fa fa-times" style="font-size:24px;color: red"></i></i></a>

									</div>
								</div>
							</td>
						</tr>
					<?php } ?>
					</tbody>
					<tfoot class="table-secondary">
						<tr>
							<td class="text-right" colspan="6"><b>Subtotal</b></td>
							<td class="text-center" colspan="1"><span class="font-weight-bolder" style="color: green">$ <?php echo $total;  ?><span></td>
						</tr>
					</tfoot>

				</table>

			<?php if($orders){ ?>
			<a href="<?php echo site_url('customer/orders/checkout');?>" type="button" class="btn btn-outline-success float-right" style="width: 100%">Proceed to checkout</a>
			<?php } ?>

			<?php } else {?>

				<h3 class="text-center"> You have No Orders Yet</h3>
			<?php } ?>
		</div>
