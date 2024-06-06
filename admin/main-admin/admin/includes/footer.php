
                
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- contact admin modal -->
    <div class="modal fade" id="contactAdminModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Contact Admin</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label>Name *</label>
                        <input type="text" class="form-control" id="s_name" >
                    </div>
                    <div class="mb-3">
                        <label>Email *</label>
                        <input type="email" class="form-control" id="s_email">
                    </div>
                    <div class="mb-3">
                        <label>Message *</label>
                        <textarea rows="5" class="form-control" id="s_message"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn text-white sendMessage" style="background: #495057;">Send Message</button>
                </div>
            </div>
        </div>
    </div>

    <!-- admin request salary modal -->
    <div class="modal fade" id="requestSalaryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Balance</h1><br>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <!-- <label>Balance *</label> -->
                        <?php 
                        $username = $_SESSION['loggedInUser']['username'];
                        $query = "SELECT * FROM admins WHERE username='$username' LIMIT 1";
                        $bal = mysqli_query($conn, $query);
                        if($bal){
                            if(mysqli_num_rows($bal) > 0){
                                $row = mysqli_fetch_assoc($bal);
                                $balance = $row['acct_bal'];
                                $bonus = $row['bonus'];
                            }
                        }
                        
                        ?>
                        <h5>Your balance is N<?= $balance ?></h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Billing Info modal -->
    <div class="modal fade" id="billInfoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Billing Information</h1><br>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="px-3 float-end" style="font-size: 0.8rem">* required</div>
                    <input type="hidden" id="admin_id" value="<?= $_SESSION['loggedInUser']['user_id']; ?>">
                    <p class="fs-6" id="exampleModalLabel">Personal information</p>
                    <div class="mb-3">
                        <label>First Name*</label>
                        <input type="text" class="form-control" id="p_fname" value="<?= $_SESSION['loggedInUser']['firstname']; ?>" >
                    </div>
                    <div class="mb-3">
                        <label>Middle Name*</label>
                        <input type="text" class="form-control" id="p_mname">
                    </div>
                    <div class="mb-3">
                        <label>Last Name*</label>
                        <input type="text" class="form-control" id="p_lname" value="<?= $_SESSION['loggedInUser']['lastname']; ?>" >
                    </div>
                    <div class="mb-3">
                        <label>Email Address *</label>
                        <input type="email" class="form-control" id="p_email" value="<?= $_SESSION['loggedInUser']['email']; ?>">
                    </div>

                    <p class="" id="exampleModalLabel">Contact Information</p>
                    <div class="mb-3">
                        <label>Phone No *</label>
                        <input type="number" class="form-control" id="p_phone" value="<?= $_SESSION['loggedInUser']['phone'] ?>">
                    </div>
                    <div class="mb-3">
                        <label>Additional Phone No</label>
                        <input type="number" class="form-control" id="p_add_phone">
                    </div>
                    <div class="mb-3">
                        <label>Billing Address *</label>
                        <input type="text" class="form-control" id="p_address">
                    </div>
                    <div class="mb-3">
                        <label>Additional Address</label>
                        <input type="text" class="form-control" id="p_add_address">
                    </div>
                    <div class="mb-3">
                        <label>Nearest Bus-stop *</label>
                        <input type="text" class="form-control" id="p_nearB">
                    </div>
                    <div class="mb-3">
                        <label>State *</label>
                        <input type="text" class="form-control" id="p_state">
                    </div>
                    <div class="mb-3">
                        <label>Postal code *</label>
                        <input type="text" maxlength="6" class="form-control" id="p_pCode">
                    </div>

                    <!-- <p class="" id="exampleModalLabel">Company Information (if applicable)</p>
                    <div class="mb-3">
                        <label>Company Name *</label>
                        <input type="text" class="form-control" id="c_name">
                    </div>
                    <div class="mb-3">
                        <label>Company Land Line *</label>
                        <input type="text" class="form-control" id="c_land_line">
                    </div>
                    <div class="mb-3">
                        <label>Company Address *</label>
                        <input type="text" class="form-control" id="c_address">
                    </div>
                    <div class="mb-3">
                        <label>Additional Address</label>
                        <input type="text" class="form-control" id="c_add_address">
                    </div>
                    <div class="mb-3">
                        <label>Nearest Bus-stop</label>
                        <input type="text" class="form-control" id="c_nearB">
                    </div>
                    <div class="mb-3">
                        <label>State *</label>
                        <input type="text" class="form-control" id="c_state">
                    </div>
                    <div class="mb-3">
                        <label>Postal code *</label>
                        <input type="text" maxlength="6" class="form-control" id="c_pCode">
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn text-white saveBillInfo" style="background: #495057;">Save Info!</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Profile picture view -->
    <div class="modal fade" id="viewProfilePhoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Profile Photo</h1><br>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <!-- <label>Balance *</label> -->
                        <?php 
                        $username = $_SESSION['loggedInUser']['username'];
                        $query = "SELECT * FROM admins WHERE username='$username' LIMIT 1";
                        $bal = mysqli_query($conn, $query);
                        if($bal){
                            if(mysqli_num_rows($bal) > 0){
                                $row = mysqli_fetch_assoc($bal);
                                $profileImage = $row['image'];
                            }
                        }
                        
                        ?>
                        <?php if($profileImage != '') : ?>
                        <img src="../<?= $profileImage ?>" alt="" width="100%" height="15rem" class="rounded-circle img-fluid border border-2 border-white bg-secondary">
                        <?php else : ?>
                        <img src="assets2/img/undraw_profile.svg" class="rounded-circle img-fluid border border-2 border-white bg-secondary">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

        <script src="assets/js/jquery-3.7.1.min.js"></script>

        <script src="assets/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $('.mySelect2').select2();
            });
        </script>

        <!-- link bootstrap func -->
        <script src="assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

        <!-- Sweet Alert -->
        <script src="assets/js/sweetalert.min.js"></script>

        <!-- jsPDf CDN Link -->
        <script src="assets/js/jspdf.umd.min.js"></script>
        <script src="assets/js/html2canvas.min.js"></script>
        <!-- // jsPDf CDN Link -->

        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

        <!-- Admin 2 link -->

        <!-- Bootstrap core JavaScript-->
        <script src="assets2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="assets2/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="assets2/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="assets2/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="assets2/js/demo/chart-area-demo.js"></script>
        <script src="assets2/js/demo/chart-pie-demo.js"></script>

        <!-- data Table -->
        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
        <!-- Page level custom scripts -->
        <script src="assets2/js/demo/datatables-demo.js"></script>

        <!-- Page level plugins -->
        <script src="assets2/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="assets2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- card script -->
        <script src="assets/js/card.js"></script>

        <script src="assets/js/custom.js"></script>
        </body>
</html>
