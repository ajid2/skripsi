<div class="page-breadcrumb">
	<div class="row">
		<div class="col-7 align-self-center">
			<h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Kelola Paket Pernikahan</h3>
		</div>
	</div>
</div>


<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="pb-2">
						<button class="btn btn-info btn-xs" data-toggle="modal" data-target="#TmbahPaket">Tambah Paket</button>
					</div>
					<div class="table-responsive">
						<table id="datatable" class="table table-striped table-bordered no-wrap">
							<thead>
								<tr>
									<th>NO</th>
									<th>Nama</th>
									<th>Harga</th>
									<th>Keterangan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								$id_v = $_SESSION['data_vendor']['id_vendor'];
								$sql = mysqli_query($conn, "SELECT * FROM paket_pernikahan WHERE id_vendor = '$id_v' AND is_delete=0 ORDER BY id_paket DESC");
								foreach ($sql as $paket) :
								?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $paket['nama']; ?></td>
										<td><?= $paket['harga']; ?></td>
										<td><?= $paket['keterangan']; ?></td>
										<td>
											<button data-toggle="modal" data-target="#editPaket<?= $paket['id_paket']; ?>" class="btn btn-warning btn-xs">Edit</button>
											<a href="paket-pernikahan/hapus.php?id=<?= $paket['id_paket']; ?>" class="btn btn-danger btn-xs">Hapus</a>
										</td>
									</tr>


									<!-- ModalEdit -->

									<div id="editPaket<?= $paket['id_paket']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content" style="padding: 20px;">

												<div class="modal-body"></div>

												<form class="pl-3 pr-3" method="POST" action="paket-pernikahan/edit.php" enctype="multipart/form-data">
													<input type="hidden" name="id_paket" value="<?= $paket['id_paket']; ?>">
													<div class="form-group">
														<label for="username">Nama Paket</label>
														<input class="form-control" type="text" id="username" required="" name="nama" placeholder="Nama Paket" value="<?= $paket['nama']; ?>">
													</div>

													<div class="form-group">
														<label for="duid">Harga</label>
														<input class="form-control" type="text" id="duid" required="" name="harga" laceholder="Harga" value="<?= $paket['harga']; ?>">
													</div>

													<div class="form-group">
														<label for="duid">Foto</label>
														<input class="form-control" type="file" name="foto">
													</div>

													<div class="form-group">
														<label for="password">Keterangan</label>
														<textarea class="form-control" required="" name="keterangan"><?= $paket['keterangan']; ?></textarea>
													</div>

													<div class="form-group text-center">
														<button class="btn btn-primary" type="submit">Submit</button>
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													</div>

												</form>

											</div>
										</div>
									</div>
					</div>

				<?php endforeach; ?>
				</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


<div id="TmbahPaket" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-body"></div>

			<form class="pl-3 pr-3" method="POST" action="paket-pernikahan/tambah.php" enctype="multipart/form-data">

				<div class="form-group">
					<label for="username">Nama Paket</label>
					<input class="form-control" type="text" id="username" required="" name="nama" placeholder="Nama Paket">
				</div>

				<div class="form-group">
					<label for="duid">Harga</label>
					<input class="form-control" type="text" id="duidx" required="" name="harga" laceholder="Harga">
				</div>

				<div class="form-group">
					<label for="duid">Foto</label>
					<input class="form-control" type="file" name="foto">
				</div>

				<div class="form-group">
					<label for="password">Keterangan</label>
					<textarea name="keterangan" id="editor1" rows="10" cols="80">Masukan Keterangan Paket</textarea>
					<script>
						// Replace the <textarea id="editor1"> with a CKEditor 4
						// instance, using default configuration.
						CKEDITOR.replace('editor1');
					</script>
				</div>

				<div class="form-group text-center">
					<button class="btn btn-primary" type="submit">Submit</button>
				</div>

			</form>

		</div>
	</div>
</div>
</div>