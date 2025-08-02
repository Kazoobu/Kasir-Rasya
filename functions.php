<?php
// Koneksi ke databsae
$conn = mysqli_connect("localhost", "root", "", "toko_penjualan");

// Global Query
function query($query)
{
    global $conn;

    //buka lemari
    $result = mysqli_query($conn, $query);
    $rows = [];

    //mengambil baju
    while ($row = mysqli_fetch_assoc($result)) {

        //$row baju yang belum di masukan ke dalam otak
        //$rows berisi baju yang di rapihkan dari row
        $rows[] = $row;
    }
    return $rows;
}
