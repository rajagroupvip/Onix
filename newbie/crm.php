<?php
include "header.php";
include "sidebar.php";
?>

<div class="main-panel">
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">DAFTAR MEMBER YANG MEMILIKI REFERRAL</h4>
                    </div>
                    <div class="card-body">
                        <?php 
                        include '../config/koneksi.php';

                        // Query SQL untuk mengambil semua nilai referral_count berdasarkan tabel cuid, diurutkan berdasarkan referral_count secara descending (terbanyak ke terendah)
                        $sql = "SELECT *, SUM(referral_count) AS total_referral_count FROM tb_user WHERE referral_count > 0 GROUP BY cuid ORDER BY total_referral_count DESC";

                        // Menjalankan query
                        $result = $conn->query($sql);

                        // Memeriksa apakah hasil query menghasilkan baris data
                        if ($result->num_rows > 0) {
                            // Membuat tabel HTML
                            echo "<input type='text' id='searchInput' placeholder='Cari username...' class='mb-3 form-control'>";
                            echo "<div class='card-datatable table-responsive'>";
                            echo "<table class='invoice-list-table table border-top'>";
                            echo "<thead><tr><th>No</th><th>Username</th><th>Total Referral Count</th><th>Aksi</th></tr></thead>";
                            echo "<tbody>";
                            // Output data dari setiap baris
                            $counter = 1;
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $counter . "</td><td>" . $row["username"]. "</td><td>" . $row["total_referral_count"]. "</td>";
                                echo "<td><a href='/newbie/referral_users.php?cuid=" . $row["cuid"] . "' class='btn btn-primary'>Cek</a></td></tr>";

                                $counter++;
                            }
                            echo "</tbody>";
                            echo "</table>";
                            echo "</div>";
                        } else {
                            echo "Tidak ada data yang ditemukan";
                        }

                        // Menutup koneksi ke database
                        ?>

                        <!-- Modal untuk menampilkan referral users -->
                        <div id="myModal" class="modal">
                        <div class="modal-dialog modal-dialog-centered modal-lg" style="width: 90%;">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Downline</h5>
                                    <button type="button" class="close" data-dismiss="modal" onclick="closeModal()">&times;</button>
                                </div>
                                <div class="modal-body" id="referralUsers" style="max-height: 80vh; overflow-y: auto;">
                                    <!-- Isi modal -->
                                </div>
                            </div>
                        </div>
                    </div>
                        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                        <script>
                            // Fungsi untuk membuka modal dan menampilkan referral users
                            function openModal(cuid) {
                                var modal = document.getElementById("myModal");
                                modal.style.display = "block";

                                // Mengambil data referral users berdasarkan cuid
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        document.getElementById("referralUsers").innerHTML = this.responseText;
                                    }
                                };
                                xhttp.open("GET", "/referral_users.php?cuid=" + cuid, true);
                                xhttp.send();
                            }

                            // Fungsi untuk menutup modal
                            function closeModal() {
                                var modal = document.getElementById("myModal");
                                modal.style.display = "none";
                            }
                             $("#searchInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".invoice-list-table tbody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
        
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php';?>
