<?php if($this->session->flashdata('success')){?>
	<div class="alert alert-success text-center"><?php echo $this->session->flashdata('success'); ?></div>
<?php };?>



<div class="container">&nbsp;

<div class="card" style="width: 100%">

	<div class="card-header">

		<div class="col">
			<b>Products:</b>
			<a class="btn btn-success  mr-1  btn-sm  float-right" href="<?php echo site_url('products/create');?>">Add Product</i></a>
		</div>
	</div>
	<div class="card-body">
<!--		@include('inc.feedback')-->

		<?php if (isset($products) && !empty($products))  { ?>

		<table class="table">
			<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Image</th>
				<th scope="col">Name</th>
				<th scope="col">Description</th>
				<th scope="col">Price</th>
<!--				<th scope="col">Created at</th>-->
<!--				<th scope="col">Last modified</th>-->

				<th scope="col">Actions</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($products as $key =>$product) {?>

			<tr>
				<th scope="row">
					<?php echo $key+1; ?>
				</th>
				<td><img src="<?php echo base_url('assets/images/products/'.$product['image']);?>" alt="image" height="40px" width="50px"></td>
				<td><?php echo $product['name']; ?></td>
				<td><?php echo $product['description']; ?></td>
				<td>
					<?php echo $product['price']; ?> <b>DT</b>
				</td>
				<td>
					<div class="row">
<!--					<div class="col">-->
<!--						<a class="btn btn-secondary mr-1  btn-sm " href="--><?php //echo site_url('products/edit/'.$product['id']);?><!--">View</i></a>-->
<!--					</div>-->
					<div class="col">
						<a class="btn btn-info mr-1  btn-sm " href="<?php echo site_url('products/edit/'.$product['id']);?>">Update</i></a>

					</div>	<div class="col">
							<a class="btn btn-danger mr-1  btn-sm " onclick="return confirm('Are you sure ?')" href="<?php echo site_url('products/delete/'.$product['id']);?>">Delete</i></a>

					</div>
					</div>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>

		<?php } else {?>

		<h3 class="text-center"> There Is No Products In Your Database</h3>
		<?php } ?>
	</div>
