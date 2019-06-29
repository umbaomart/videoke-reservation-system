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
                <li> <div class="ui-left"></div> <a href="<?php echo URLROOT ?>/bookings"> <i class="fa fa-window itag-restore"></i> BOOKING</a></li>
                <li> <div class="ui-left"></div> <a href=""> <i class="fa fa-calendar-day active-itag"></i> SCHEDULE</a></li>
                <li> <div class="ui-left"></div> <a href=""> <i class="fa fa-ruble-sign active-itag"></i> INCOME</a></li>
                <li> <div class="ui-left active"></div> <a href="<?php echo URLROOT . "/videokes"?>" class="active-atag"> <i class="fa fa-tv"></i> VIDEOKE</a></li>
            </ul>
        </div>
        <!-- Right content -->
        <div class="main-content booking-content no-scroll">
            <div class="nav-tabs">
                <a href="<?php echo URLROOT; ?>/videokes/add" class="_tab _tab__active">Add Videoke</a>
                <a href="<?php echo URLROOT; ?>/videokes"  class="btn_" id="btn_"> <i class="fa fa-arrow-left"></i> Back</a>
            </div>
            <!-- <div class="title">
                <button class="btn_ btn-add"><i class="fa fa-plus"></i> Book Now</button>
            </div> -->
            <!-- <?php echo '<pre>',print_r($data),'</pre>' ?> -->
            <form action="" method="post">
                <div class="form__group">
                    <div class="form-group">
                        <div class="__form-group">
                            <label for="name">Videoke Name</label>
                            <div class="__form-error">
                                <p><sup>*</sup></p>
                            </div>
                        </div>
                        <input type="text" name="vid_name" class="" value="<?php echo $data['vid_name']; ?>">
                        <span> <?php echo $data['vid_name_err']; ?> </span>
                    </div>
                    <div class="form-group">
                        <div class="__form-group">
                            <label for="dvd_model">DVD Model</label>
                            <div class="__form-error">
                                <p><sup>*</sup></p>
                            </div>
                        </div>
                        <input type="text" name="dvd_model" value="<?php echo $data['dvd_model']; ?>">
                        <span> <?php echo $data['dvd_model_err']; ?> </span>
                    </div>
                    <div class="form-group">
                        <div class="__form-group">
                            <label for="color">Color</label>
                            <div class="__form-error">
                                <p><sup>*</sup></p>
                            </div>
                        </div>
                        <input type="text" name="color" value="<?php echo $data['color']; ?>">
                        <span> <?php echo $data['color_err']; ?> </span>
                    </div>
                </div>
                <div class="form__group">
                    <div class="form-group">
                        <div class="__form-group">
                            <label for="st_brgy">year</label>
                            <div class="__form-error">
                                <p><sup>*</sup></p>
                            </div>
                        </div>
                        <input type="number" name="year" value="<?php echo $data['year']; ?>">
                        <span> <?php echo $data['year_err']; ?> </span>
                    </div>
                    <!--  -->
                    <div class="form-group __hide">
                        <!-- Add another input if you want -->
                    </div>
                    <!--  -->
                    <div class="form-group __hide">
                        <!-- Add another input if you want -->
                    </div>
                </div>
                <div class="form__group">
                    <!--  -->
                    <div class="form-group __hide">
                        <!-- Add another input if you want -->
                    </div>
                    <!--  -->
                    <div class="form-group __hide">
                        <!-- Add another input if you want -->
                    </div>
                    <!--  -->
                    <div class="form-group __hide">
                        <!-- Add another input if you want -->
                    </div>
                </div>
                <div class="form__group">
                    <!--  -->
                    <div class="form-group __hide">
                        <!-- Add another input if you want -->
                    </div>
                    <!--  -->
                    <div class="form-group __hide">
                        <!-- Add another input if you want -->
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