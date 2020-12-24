<html>
<head>
<title>Rest API Rental Mobil</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<h3 class="text-center mt-2">Rest API Persewaan Mobil</h3>
<div class="container mt-5">   
  <form class="form-inline" action="" method="POST">
    <input class="form-control mr-sm-2" type="text" name="order_id" placeholder="Enter Order ID" required aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
  </form>

<?php
if (isset($_POST['order_id']) && $_POST['order_id']!="") {
	$order_id = $_POST['order_id'];
	$url = "http://localhost/api_rentcar/api/".$order_id;
	
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
	
	$result = json_decode($response);
	if (empty($result->order_id)) {
	  echo "No Record Found";
	}else{
/*
	echo "<table class='table table-bordered table-hover'>
		  <thead class='bg-light'>
		    <tr>
		      <th scope='col'></th>
		      <th scope='col'>Order ID</th>
		      <th scope='col'>Pemesan</th>
		      <th scope='col'>Mobil</th>
		      <th scope='col'>Tanggal Pesan</th>
		      <th scope='col'>Tanggal Pinjam</th>
		      <th scope='col'>Tanggal Kembali</th>
		      <th scope='col'>Lama Rental</th>
		      <th scope='col'>Total Bayar</th>
		      <th scope='col'>Status Transaksi</th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th scope='row'>1</th>
		      <td>$result->order_id</td>
		      <td>$result->nama_pemesan</td>
		      <td>$result->mobil</td>
		      <td>$result->tgl_pesan</td>
		      <td>$result->tgl_pinjam</td>
		      <td>$result->tgl_kembali</td>
		      <td>$result->lama_rental</td>
		      <td>$result->total_bayar</td>
		      <td>$result->status_transaksi</td>
		    </tr>
		</table>";
*/
	print_r($response);
	}
}
    ?>
</div>
</body>
</html>