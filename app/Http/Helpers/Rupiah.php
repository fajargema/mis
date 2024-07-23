<?php

if (!function_exists('rupiah')) {
    function rupiah($rp)
    {
        return 'Rp. ' . number_format($rp, 0, "", ".");
    }
}
