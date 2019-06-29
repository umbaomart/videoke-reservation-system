<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container data">
    <div class="main-app">
        <!-- Side-nav -->
        <div class="side-nav">
            <!-- profile pic -->
            <div class="profile">
                <!-- <img src="" alt=""> -->
                <div class="user-name">
                    <i class="fa fa-tv"></i> <p>VIDEOKE RESERVATION</p><p class="system">SYSTEM</p>
                </div>
            </div>
            <!-- main nav -->
            <ul>
                <li> <div class="ui-left "></div> <a href="<?php echo URLROOT; ?>/" class=""> <i class="fa fa-chart-area active-itag"></i> DASHBOARD</a></li>
                <li> <div class="ui-left active"></div> <a href="<?php echo URLROOT ?>/bookings" class="active-atag"> <i class="fa fa-window-restore"></i> BOOKING</a></li>
                <li> <div class="ui-left"></div> <a href=""> <i class="fa fa-calendar-day active-itag"></i> SCHEDULE</a></li>
                <li> <div class="ui-left"></div> <a href=""> <i class="fa fa-ruble-sign active-itag"></i> INCOME</a></li>
                <li> <div class="ui-left"></div> <a href="<?php echo URLROOT . "/videokes"?>"> <i class="fa fa-tv active-itag"></i> VIDEOKE</a></li>
            </ul>
        </div>
        <!-- Right content -->
        <div class="main-content booking-content no-scroll">
            <div class="nav-tabs">
                <a href="<?php echo URLROOT; ?>/bookings/edit<?php echo $data['book_id']; ?>" class="_tab _tab__active">Edit Booking</a>
                <a href="<?php echo URLROOT; ?>/bookings"  class="btn_" id="btn_"> <i class="fa fa-arrow-left"></i> Back</a>
            </div>

            <!-- This is the edit form with value -->

                <form action="" method="post">
                    <div class="form__group">
                        <div class="form-group">
                            <div class="__form-group">
                                <label for="name">Name</label>
                                <div class="__form-error">
                                    <p><sup>*</sup></p>
                                </div>
                            </div>
                            <?php 
                                echo "<input type='text' name='name' class='' value='{$data['name']}'>";
                            ?>
                            <span> <?php echo $data['name_err']; ?> </span>
                        </div>
                        <div class="form-group">
                            <div class="__form-group">
                                <label for="last_name">Last Name</label>
                                <div class="__form-error">
                                    <p><sup>*</sup></p>
                                </div>
                            </div>
                            <?php 
                                echo "<input type='text' name='last_name' value='{$data['last_name']}'>";
                            ?>
                            <span> <?php echo $data['last_name_err']; ?> </span>
                        </div>
                        <div class="form-group">
                            <div class="__form-group">
                                <label for="municipality">Municipality</label>
                                <div class="__form-error">
                                    <p><sup>*</sup></p>
                                </div>
                            </div>

                            <?php 
                                if ($data['municipality'] == 'Nabua') {
                                    echo "
                                        <select name='municipality' id=''>
                                            <option value='Nabua'>Nabua</option>
                                            <option value='Bato'>Bato</option>
                                            <option value='Balatan'>Balatan</option>
                                        </select>
                                    ";
                                } elseif ($data['municipality'] == 'Bato') {
                                    echo "
                                        <select name='municipality' id=''>
                                        <option value='Bato'>Bato</option>
                                            <option value='Nabua'>Nabua</option>
                                            <option value='Balatan'>Balatan</option>
                                        </select>
                                    ";
                                    
                                } else {
                                    echo "
                                        <select name='municipality' id=''>
                                            <option value='Balatan'>Balatan</option>
                                            <option value='Bato'>Bato</option>
                                            <option value='Nabua'>Nabua</option>
                                        </select>
                                    ";
                                } 
                            ?>
                            <span> <?php echo $data['municipality_err']; ?> </span>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form-group">
                            <div class="__form-group">
                                <label for="st_brgy">St & Brgy</label>
                                <div class="__form-error">
                                    <p><sup>*</sup></p>
                                </div>
                            </div>
                            <?php echo "<input type='text' name='st_brgy' value='{$data['st_brgy']}'>"; ?>
                            <span> <?php echo $data['st_brgy_err']; ?> </span>
                        </div>
                        <div class="form-group">
                            <div class="__form-group">
                                <label for="date_rented">BOOK DATE</label>
                                <div class="__form-error">
                                    <p><sup>*</sup></p>
                                </div>
                            </div>
                            <?php 
                                echo "<input type='date' name='date_rented_start' value='{$data['date_rented_start']}'>";
                            ?>
                            <span> <?php echo $data['date_rented_start_err']; ?> </span>
                        </div>
                        <div class="form-group">
                            <div class="__form-group">
                                <label for="date_upto">UPTO DATE</label>
                                <div class="__form-error">
                                    <p><sup>*</sup></p>
                                </div>
                            </div>
                            <?php 
                                echo "<input type='date' name='date_upto' value='{$data['date_upto']}'>";
                            ?>
                            <span> <?php echo $data['date_upto_err']; ?> </span>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form-group">
                            <div class="__form-group">
                                <label for="name">Time to Deliver</label>
                                <div class="__form-error">
                                    <p><sup>*</sup></p>
                                </div>
                            </div>
                            <?php 
                                echo "<input type='time' name='time_to_deliver' value='{$data['time_to_deliver']}'>";
                            ?>
                            <span> <?php echo $data['time_to_deliver_err']; ?> </span>
                        </div>
                        <div class="form-group">
                            <div class="__form-group">
                                <label for="name">Videoke Type / Name</label>
                                <div class="__form-error">
                                    <p><sup>*</sup></p>
                                </div>
                            </div>
                            <?php 
                                if ($data['videoke_name'] == 1) {
                                    echo "
                                        <select name='videoke_name' id=''>
                                            <option value='1'>Hyundai</option>
                                            <option value='2'>Platinum</option>
                                            <option value='3'>MegaPro</option>
                                        </select>
                                    ";
                                } elseif ($data['videoke_name'] == 2) {
                                    echo "
                                        <select name='videoke_name' id=''>
                                            <option value='2'>Platinum</option>
                                            <option value='1'>Hyundai</option>
                                            <option value='3'>MegaPro</option>
                                        </select>
                                    ";
                                } else {
                                    echo "
                                        <select name='videoke_name' id=''>
                                            <option value='3'>MegaPro</option>
                                            <option value='1'>Hyundai</option>
                                            <option value='2'>Platinum</option>
                                        </select>
                                    ";
                                }
                            ?>
                            <span> <?php echo $data['videoke_name_err']; ?> </span>
                        </div>
                        <div class="form-group">
                            <div class="__form-group">
                                <label for="name">Contact No</label>
                                <div class="__form-error">
                                    <p><sup>*</sup></p>
                                </div>
                            </div>
                            <?php 
                                echo "<input type='text' name='contact_no' value='{$data['contact_no']}'>";
                            ?>
                            <span> <?php echo $data['contact_no_err']; ?> </span>
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form-group">
                            <div class="__form-group">
                                <label for="name"> RENT FEE</label>
                                <div class="__form-error">
                                    <p><sup>*</sup></p>
                                </div>
                            </div>
                            <?php 
                                echo "<input type='number' name='fee' value='{$data['fee']}'>";
                            ?>
                            <span> <?php echo $data['fee_err']; ?> </span>
                        </div>
                        <div class="form-group __hide">
                            <!-- Add another input if you want -->
                            <?php echo "<input type='hidden' name='booking_id' value='{$data['book_id']}'>"; ?>
                        </div>
                        <div class="form-group __hide">
                            <!-- Add another input if you want -->
                        </div>
                    </div> <!-- End of forms -->
                    <!-- button submit here -->
                    <div class="booking-btn-submit">
                        <input type="submit" class="btn_">
                    </div>
                </form>
               
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>