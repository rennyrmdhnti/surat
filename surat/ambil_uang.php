<?php
// Memanggil file koneksi.php
require_once 'config/koneksi.php';
// Mengambil nilai "no_sppd" yang dikirimkan melalui permintaan AJAX
$nama = $_POST['nama'];
$no_sppd = $_POST['no_sppd'];

// Query untuk mengambil data dari tabel berdasarkan "no_sppd" yang dipilih
$query = "SELECT tp.nama, tp2.id as id_propinsi, tp.id_gol,
CASE
    WHEN tp.id_gol BETWEEN 1 AND 4 THEN tp3.kategori1*tpd.lama 
    WHEN tp.id_gol BETWEEN 5 AND 8 THEN tp3.kategori2*tpd.lama 
    WHEN tp.id_gol BETWEEN 9 AND 12 THEN tp3.kategori3*tpd.lama 
END AS penginapan,
case 
        when tp.id_gol between 1 and 4 then tp4.bisnis*2
        else tp4.ekonomi*2
end as pesawat,
tt.besaran*tpd.lama as transportasi, tpd.lama , tuh.besaran*tpd.lama as uang_harian
FROM tb_pegawai tp
LEFT JOIN tb_perintah_tugas tpt ON tpt.nama = tp.nama
LEFT JOIN tb_perjalan_dinas tpd ON tpd.no_spt = tpt.no_spt
LEFT JOIN tb_kabupaten tk ON tk.nama = tpd.tempat_tujuan
LEFT JOIN tb_propinsi tp2 ON tp2.id = tk.propinsi_id
LEFT JOIN tb_penginapan tp3 ON tp3.propinsi = tp2.id
left join tb_pesawat tp4 on tp4.id_pesawat = tp2.id 
left join tb_transportasi tt on tt.nama_provinsi = tk.propinsi_id 
left join tb_uang_harian tuh on tuh.id_propinsi = tk.propinsi_id 
WHERE tp.nama = '$nama' and tpd.no_sppd = '$no_sppd'";
$result = mysqli_query($conn, $query);

$data = array(); // Array untuk menyimpan data

// Iterasi hasil query dan menambahkan data ke dalam array
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = array(
        'nama' => $row['nama'],
        'penginapan' => $row['penginapan'],
        'pesawat' => $row['pesawat'],
        'transportasi' => $row['transportasi'],
        'lama' => $row['lama'],
        'uang_harian' => $row['uang_harian']
    );
}

// Mengembalikan data sebagai respons JSON
echo json_encode($data);

?>