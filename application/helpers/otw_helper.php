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

if (!function_exists('str_contains')) {
    function str_contains(string $haystack, string $needle): bool
    {
        return '' === $needle || false !== strpos($haystack, $needle);
    }
}

function get_user_by_id($id){

	$CI3 = get_instance();
    $CI3->load->model('Pengunjung_model', 'pengunjung');
	$pengunjung = $CI3->pengunjung->getById($id);
	if(!$pengunjung) return null;
	return $pengunjung;
}
