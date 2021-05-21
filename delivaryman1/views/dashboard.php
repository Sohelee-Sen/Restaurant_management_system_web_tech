<?php
	if(!isset($_COOKIE["username"])){
		header("Location: login.php");
	}
	include 'delivaryman_header.php';
?>
<!--dashboard starts -->
<div>
	<table  align="center">
		<tr>
			<td>
				<div class="card">
				<span class="text-white"> fast food <br>
					avilable 3
				</span>
				</div>
			</td>
			<td>
				<div class="card">
				<span class="text-white"> Set Menu <br>
					avilable 1
				</span>
				</div>
			</td>
			<td>
				<div class="card">
				<span class="text-white"> Desert <br>
					avilable 3
				</span>
				</div>
			</td>
			<td>
			<div class="card">
				<span class="text-white"> Beverage <br>
					avilable 3
				</span>
				</div>
			</td>
		</tr>
	</table>
</div>
<div class="center">
	<h3 class="text-white">Recent Orders</h3>
	<table class="table table-striped">
		<thead>
			<th>Sl#</th>
			<th>food Name</th>
			<th>food Price</th>
			<th>Sales Qty</th>
			<th>Sales Date</th>
		</thead>
		
		<tbody>
			<td>1</td>
			<td>Chicken Cheese Burger</td>
			<td>200</td>
			<td>5</td>
			<td>25.04.2021</td>
		</tbody>
		<tbody>
			<td>2</td>
			<td>Ice Cream</td>
			<td>200</td>
			<td>2</td>
			<td>25.04.2021</td>
		</tbody>
	</table>
</div>
<!--dashboard ends -->
<?php include 'delivaryman_footer.php';?>