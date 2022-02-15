<?php 

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<center><h2>Report Data Siswa</h2></center>
<br>
<table border="1" width="80%">

<thead>
   <tr>
   <th align="center">No</th>
   <th align="center">Nama</th>
   <th align="center">Kelamin</th>
   <th align="center">Handphone</th>
   <th align="center">Email</th>
   <th align="center">Jenis Kursus</th>
   <th align="center">Bidang Studi</th>
   <th align="center">Status</th>
   <th align="center">Tanggal Buat</th>
   </tr>
 </thead>


<tbody>
	<?php
	if (!empty($excel)) {
	$no = 1;
	foreach ($excel as $data) { ?>
    <tr>
	<td><?php echo $no ?></td>
	<td><?php echo $data->nama ?></td>
	<td><?php echo $data->jenis_kelamin ?></td>
	<td><?php echo $data->handphone ?>&nbsp;</td>
	<td><?php echo $data->email ?></td>
	<td><?php echo $data->jenis_kursus ?></td>
	<td><?php echo $data->bidang_studi ?></td>
	<td><?php echo $data->status ?></td>
	<td><?php echo date('d-m-Y',strtotime($data->tanggal)); ?></td>
	</tr>
    <?php $no++; } ?>
	<?php } else {  ?>
	<center><?php echo "Belum Ada data" ?></center>
	<?php } ?>
</tbody>
</table>




