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
                            Daftar Rekening QRIS
                            <div class="float-right" style="float: right;">
                                <button id="formemodalButton" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#formemodal" data-bs-backdrop="static" data-bs-keyboard="false">
                                    </i> UPDATE QRIS
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
                                        <h5 class="modal-title" id="formemodalLabel">Tambah QRIS</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!--<form role="form" action="tools/add-qris.php"-->
                                        <form role="form" action="/newbie/tools/add-qris.php"
                                            method="post" enctype="multipart/form-data">
                                            <div class="form-group mb-2">
                                                <label for="noRekInput">Nama QRIS</label>
                                                <input type="text" id="noRekInput" name="Nama" class="form-control"
                                                    value="" required>
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="pemilikInput">Link QRIS</label>
                                                <input type="text" id="noRekInput" name="Gambar" class="form-control"
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
                                        <th class="text-center" style="vertical-align: middle;">NAMA QRIS</th>
                                        <th class="text-center" style="vertical-align: middle;">Gambar</th>
                                        </th>
                                        <th class="text-center" style="vertical-align: middle;">Status</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                        $sql_1 = mysqli_query($conn,"SELECT * FROM `tb_qris` WHERE id = 1 ");
                                        $no=0;
                                        while($s1 = mysqli_fetch_array($sql_1)){
                                            $no++;
                                    ?>
                                    <tr>
                                        <td class="text-center" style="vertical-align: middle;"><?php echo $no; ?></td>
                                        <td class="text-left" style="vertical-align: middle; white-space: normal;">
                                            <?php echo $s1['nama']; ?></td>
                                        <td class="text-left" style="vertical-align: middle; white-space: normal;">
                                            <img src="<?php echo $s1['gambar']; ?>" alt=""
                                                style="display:block; margin:auto; width: 100px; height: 100px;">
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

                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "footer.php";?>