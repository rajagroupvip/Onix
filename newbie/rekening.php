<?php 
include "header.php";
include "sidebar.php";
?>
<div class="main-panel">
    <div class="content">
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-1">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Rekening Deposit</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            Daftar Rekening Deposit
                            <div class="float-right" style="float: right;">
                                <button id="formemodalButton" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#formemodal" data-bs-backdrop="static" data-bs-keyboard="false">
                                    <i class="fa fa-plus mr-1"></i> Tambah Bank
                                </button>
                            </div>
                        </div>
                        <hr>

                        <!-- Modal -->
                        <div class="modal fade" id="formemodal" tabindex="-1" aria-labelledby="formemodalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content animated bounceIn">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="formemodalLabel">Tambah Rekening</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form role="form" action="tools/add-bank.php" method="post">
                                        <!--<form role="form" action="#" method="post">-->
                                            <div class="form-group mb-2">
                                                <label for="bankSelect">Pilih Bank</label>
                                                <select id="bankSelect" name="image" class="form-control" required>
                                                    <option value=""> Pilih </option>
                                                    <option
                                                        value="https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/bank/bca.webp">
                                                        Bank BCA </option>
                                                    <option
                                                        value="https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/bank/bni.webp">
                                                        Bank BNI </option>
                                                    <option
                                                        value="https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/bank/bri.png">
                                                        Bank BRI </option>
                                                    <option
                                                        value="https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/bank/mandiri_color.webp">
                                                        Bank MANDIRI </option>
                                                    <option
                                                        value="https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/bank/cimb.webp">
                                                        Bank CIMB </option>
                                                    <option
                                                        value="https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/epayment/dana.webp">
                                                        E-Wallet DANA </option>
                                                    <option
                                                        value="https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/epayment/ovo.webp">
                                                        E-Wallet OVO </option>
                                                    <option
                                                        value="https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/epayment/gopay_color.webp">
                                                        E-Wallet GOPAY </option>
                                                    <option
                                                        value="https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/bank/shopeepay.webp">
                                                        E-Wallet SHOPEEPAY </option>
                                                    <option
                                                        value="https://statis-images.s3.ap-southeast-1.amazonaws.com/global/payment/V2/IDR/epayment/linkaja.webp">
                                                        E-Wallet LINKAJA </option>

                                                </select>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="noRekInput">Nomor Rekening</label>
                                                <input type="number" id="noRekInput" name="no_rek" class="form-control"
                                                    value="" required>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="pemilikInput">Nama Pemilik Rekening</label>
                                                <input type="text" id="pemilikInput" name="pemilik" class="form-control"
                                                    value="" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="submit" class="btn btn-primary">Add</button>
                                                <button class="btn btn-secondary" type="button"
                                                    data-bs-dismiss="modal">Cancel</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                            integrity="sha256-oLp1lRrKtOQO79K2d8r+qJes9tGGh8O7Fh/W1Id30+I=" crossorigin="anonymous">
                        </script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
                            integrity="sha384-bbVXEAg+Vlkh5U8u3Ri6O5m5/Z9wFQD5S9FpUYQp5M/2DQdOhpHA4NhF+9wwI8zk"
                            crossorigin="anonymous"></script>

                        <script>
                            $(document).ready(function () {
                                $('#formemodalButton').click(function () {
                                    $('#formemodal').modal('show');
                                });
                            });
                        </script>


                        <div class="card-datatable table-responsive">
                            <table id="default-datatable" class="invoice-list-table table border-top">
                                <thead>
                                    <tr class="bg-info">
                                        <th class="text-center" style="vertical-align: middle;">No</th>
                                        <th class="text-center" style="vertical-align: middle;">Rekening Bank</th>
                                        <th class="text-center" style="vertical-align: middle;">Nomor Rekening</th>
                                        <th class="text-center" style="vertical-align: middle;">Nama Pemilik Rekening
                                        </th>
                                        <th class="text-center" style="vertical-align: middle;">Status</th>
                                        <th class="text-center" style="vertical-align: middle;">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $sql_1 = mysqli_query($conn, "SELECT * FROM `tb_bank` WHERE userID = 1 AND image <> 'qris.png' ORDER BY cuid ASC") or die(mysqli_error());
                                        $no=0;
                                        while($s1 = mysqli_fetch_array($sql_1)){
                                            $no++;
                                    ?>
                                    <tr>
                                        <td class="text-center" style="vertical-align: middle;"><?php echo $no; ?></td>
                                        <td class="text-left" style="vertical-align: middle; white-space: normal;">
                                            <?php echo $s1['akun']; ?></td>
                                        <td class="text-left" style="vertical-align: middle; white-space: normal;">
                                            <?php echo $s1['no_rek']; ?></td>
                                        <td class="text-left" style="vertical-align: middle; white-space: normal;">
                                            <?php echo $s1['pemilik']; ?></td>
                                        <td class="text-center" style="vertical-align: middle; white-space: normal;">
                                            <?php
                                                if($s1['status'] == 1){
                                                    echo '
                                                    <span class="badge-dot">
                                                        <i class="bg-success"></i> Online
                                                    </span>
                                                    ';
                                                }
                                                else if($s1['status'] == 0){
                                                    echo '
                                                    <span class="badge-dot">
                                                        <i class="bg-danger"></i> Offline
                                                    </span>
                                                    ';
                                                }
                                            ?>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle; white-space: normal;">
                                            <a href="tools/bank-status.php?postID=<?php echo $s1['cuid']; ?>&status=<?php echo $s1['status']; ?>"
                                                class="btn <?php if($s1['status'] == 1){ echo 'btn-success'; } else { echo 'btn-warning'; } ?> btn-sm"><i
                                                    class="fa fa-heart"></i></a>
                                            <a href="tools/del-bank.php?cuid=<?php echo $s1['cuid']; ?>"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal outside the loop -->
        <div class="modal fade" id="editModal<?php echo $s1['cuid']; ?>" tabindex="-1" role="dialog"
            aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Rekening</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Form to handle editing -->
                        <form action="tools/edit-bank.php" method="POST">
                            <!-- Include hidden input for cuid -->
                            <input type="hidden" name="cuid" value="<?php echo $s1['cuid']; ?>">
                            <!-- Other form fields for editing -->
                            <label for="editedField">Edited Field:</label>
                            <input type="text" name="editedField" value="<?php echo $s1['editedField']; ?>"
                                class="form-control" required>
                            <!-- Add more fields as needed -->

                            <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function () {
                // Ensure your modal IDs are unique, and use a class selector to target all modals
                $('[data-toggle="modal"]').click(function () {
                    var targetModalId = $(this).data('target');
                    $(targetModalId).modal('show');
                });
            });
        </script>
        </div>
        <?php include "footer.php";?>