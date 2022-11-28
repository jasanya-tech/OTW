<style>
    .sidebar {
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: #f1f1f1;
        position: fixed;
        height: 100%;
        overflow: auto;
    }

    .sidebar a {
        display: block;
        color: black;
        padding: 16px;
        text-decoration: none;
    }

    .sidebar a.active {
        background-color: #04AA6D;
        color: white;
    }

    .sidebar a:hover:not(.active) {
        background-color: #555;
        color: white;
    }

    div.content {
        margin-left: 200px;
        padding: 1px 16px;
        height: 1000px;
    }
</style>

<div class="sidebar">
    <a class="<?= str_contains(current_url(), 'admin') ? 'active' : '' ?>" href="<?= base_url('admin') ?>">Dashboard</a>
    <a class="<?= str_contains(current_url(), 'tiket') ? 'active' : '' ?>" href="<?= base_url("tiket") ?>">Tiket</a>
    <a class="<?= str_contains(current_url(), 'transaksi') ? 'active' : '' ?>" href="<?= base_url('transaksi') ?>">Transaksi</a>
    <a class="<?= str_contains(current_url(), 'metode_pembayaran') ? 'active' : '' ?>" href="<?= base_url('metode_pembayaran') ?>">Metode Pembayaran</a>
    <a class="<?= str_contains(current_url(), 'fasilitas') ? 'active' : '' ?>" href="<?= base_url('fasilitas') ?>">fasilitas</a>
    <a class="<?= str_contains(current_url(), 'admin/register') ? 'active' : '' ?>" href="<?= base_url('admin/register') ?>">tambah admin</a>
    <a class="<?= str_contains(current_url(), 'auth/logout') ? 'active' : '' ?>" href="<?= base_url('auth/logout') ?>">logout</a>
</div>