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
    <a class="active" href="<?= base_url('admin') ?>">Dashboard</a>
    <a href="<?= base_url("/tiket") ?>">Tiket</a>
    <a href="<?= base_url("/transaksi") ?>">Transaksi</a>
    <a href="#about">User</a>
</div>