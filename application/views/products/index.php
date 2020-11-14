<?php if($this->session->flashdata('success')){?>
	<div class="alert alert-success text-center"><?php echo $this->session->flashdata('success'); ?></div>
<?php };?>
<div class="container">&nbsp;

<div class="card" style="width: 100%">

	<div class="card-header">

		<div class="col">
			<b>Products:</b>
			<a class="btn btn-success  mr-1  btn-sm  float-right" href="<?php echo site_url('products/create');?>">Add product</i></a>
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
				<th scope="col">Category</th>
				<th scope="col">Created at</th>
				<th scope="col">Last modified</th>
				<th scope="col">Actions</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($products as $product) {?>

			<tr>
				<th scope="row">{{$key+1}}</th>
				<td>image</td>
				<td><?php echo $product['title']; ?></td>
				<td><?php echo $product['category']; ?></td>
				<td>
					created at
				</td><td>
					lastmodified
				</td>
				<td>
					<div class="row">
					<div class="col">
						<a class="btn btn-secondary mr-1  btn-sm " href="">View</i></a>
					</div>
					<div class="col">
						<button type="submit" class="btn btn-info btn-sm" onclick="" >Update</button>
					</div>	<div class="col">
						<button type="submit" class="btn btn-danger btn-sm" onclick="" >Delete</button>
					</div>
					</div>
				</td>
			</tr>
			<?php } ?>
			</tbody>
		</table>

		<?php } else {?>

		<h3 class="text-center"> There Is No Catalogues In Your Database</h3>
		<?php } ?>
	</div>
