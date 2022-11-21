<?php $this->load->view('layouts/navbar'); ?>
<?php $this->load->view('layouts/sidebar'); ?>

<div class="container p-5">
    <h1>Daftar tiket</h1>
    <table class="table">
    <a href="<?= base_url("/tiket/create") ?>" type="button" class="btn btn-primary my-3">Tambah tiket</a>
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Kategori hari</th>
        <th scope="col">Harga</th>
        <th scope="col">Jam mulai kunjungan</th>
        <th scope="col">Jam selesai kunjungan</th>
        <th scope="col">Aksi</th>
        </tr>
    </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
      <td>
      <a href="<?= base_url("/tiket/update")?>" class="badge rounded-pill bg-warning fs-6">Edit</a>
        <a class="badge rounded-pill bg-danger fs-6">Hapus</a>
      </td>
    </tr>
  </tbody>
</table>
</div>