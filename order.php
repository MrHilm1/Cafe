<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT tb_order.*,nama, SUM(harga*jumlah) AS harganya FROM tb_order LEFT JOIN tb_user ON tb_user.id = tb_order.pelayan
LEFT JOIN tb_list_order ON tb_list_order.id_list_order =tb_order.id_order
LEFT JOIN tb_daftar_menu ON tb_daftar_menu.id = tb_list_order.menu
GROUP BY id_order");
while ($record = mysqli_fetch_array($query)) {
    $res[] = $record;
}

//$select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu, kategori_menu FROM tb_kategori_menu");
?>
<div class="col-lg-9 mt-2">
    <div class="card">
        <div class="card-header">
            Halaman Order
        </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-nowrap">
                            <th scope="col">No</th>
                            <th scope="col">Kode Order</th>
                            <th scope="col">Pelanggan</th>
                            <th scope="col">Meja</th>
                            <th scope="col">Total Harga</th>
                            <th scope="col">Pelayan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Waktu Order</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($res as $row) {
                            ?>
                            <tr>
                                <th scope="row">
                                    <?php echo $no++ ?>
                                </th>

                                <td>
                                    <?php echo $row['kode_order'] ?>
                                </td>
                                <td>
                                    <?php echo $row['pelanggan'] ?>
                                </td>
                                <td>
                                    <?php echo $row['meja'] ?>
                                </td>
                                <td>
                                    <?php echo $row['harganya'] ?>
                                </td>
                                <td>
                                    <?php echo $row['nama'] ?>
                                </td>
                                <td>
                                    <?php echo $row['status'] ?>
                                </td>
                                <td>
                                    <?php echo $row['waktu_order'] ?>
                                </td>
                                <td>

                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>