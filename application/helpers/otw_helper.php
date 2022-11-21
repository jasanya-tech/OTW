<?php

function alert($status, $message)
{
    if ($status == 'success') {
        return '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    ' . $message . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    } else {
        return '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                ' . $message . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
}

function harga_rupiah($nominal)
{
    return 'Rp. ' . number_format($nominal, 2, ',', '.');
}
