<?php $this->load->view('layouts/navbar'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="content p-5">
  <h1>Daftar Transaksi</h1>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Qty</th>
        <th scope="col">Total</th>
        <th scope="col">Tanggal Transaksi</th>
        <th scope="col">Id Pengunjung</th>
        <th scope="col">Id MP</th>
        <th scope="col">Id Admin</th>
        <th>aksi</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td>@mdo</td>
        <td>putri</td>
        <td>niken</td>
        <td>
          <a href="<?= base_url("/transaksi/update") ?>" class="badge rounded-pill bg-warning fs-6">Edit</a>
          <a class="badge rounded-pill bg-danger fs-6">Hapus</a>
          <a class="badge rounded-pill bg-primary fs-6" data-bs-toggle="modal" data-bs-target="#exampleModal">Lihat bukti</a>
        </td>
      </tr>
    </tbody>
  </table>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Bukti Pembayaran</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img src="<?= base_url("/assets/img/gambar.jpg") ?>" alt="" class="img-thumbnail">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Konfirmasi Pembayaran</button>
        </div>
      </div>
    </div>
  </div>
</div>