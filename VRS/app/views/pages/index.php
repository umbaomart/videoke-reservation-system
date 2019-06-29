<?php require APPROOT . '/views/inc/header.php'; ?>
<!-- <h1><?php echo $data['title']; ?></h1> -->
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
                <li> <div class="ui-left active"></div> <a href="<?php echo URLROOT; ?>" class="active-atag"> <i class="fa fa-chart-area"></i> DASHBOARD</a></li>
                <li> <div class="ui-left"></div> <a href="<?php echo URLROOT; ?>/bookings"> <i class="fa fa-window-restore active-itag"></i> BOOKING</a></li>
                <li> <div class="ui-left"></div> <a href=""> <i class="fa fa-calendar-day active-itag"></i> SCHEDULE</a></li>
                <li> <div class="ui-left"></div> <a href=""> <i class="fa fa-ruble-sign active-itag"></i> INCOME</a></li>
                <li> <div class="ui-left"></div> <a href="<?php echo URLROOT . "/videokes"?>"> <i class="fa fa-tv active-itag"></i> VIDEOKE</a></li>
            </ul>
        </div>
        <!-- Right content -->
        <div class="main-content">
            <div class="title">
                <h2>DASHBOARD</h2>
            </div>
            <div class="content">
                <div class="current">
                    <button>Booking for the Month of <span>( <?php echo date('M d Y'); ?> )</span> </button>
                </div>
                <div class="content-list">
                    <div class="nav-tab">
                        <div class="_nav-tab-child nav-name"><h3>Videoke Name</h3></div>
                        <div class="_nav-tab-child nav-reserved-to"><h3>Reserved To / Date Reserved</h3></div>
                        <div class="_nav-tab-child nav-status"><h3>Status</h3></div>
                        <div class="_nav-tab-child nav-status"><h3>Actions</h3></div>
                    </div>

                    <!-- loop the $books to $book variable / loop into an array to get the object in the array -->
                    <?php foreach($data['books'] as $book) : ?>

                        <div class="nav-content">
                            <div class="__name _nav-content-child">
                                <div class="__name_wrapper">
                                    <!-- <img src="" alt="" class="__vidname"> -->
                                    <?php 
                                            if ($book->vid_id == 1) {
                                                echo    "<h3>HYUNDAI</h3>
                                                        <span class='__vidplayer'>HDT MIDI</span>";
                                                        
                                            } else if ($book->vid_id == 1) {
                                                echo    "<h3>PLATINUM</h3>
                                                        <span class='__vidplayer'>Reyna 2</span>";
                                            } else {
                                                echo    "<h3>MEGAPRO</h3>
                                                        <span class='__vidplayer'>MS EZRA</span>";
                                            }
                                    ?>
                                </div>
                            </div>
                            <div class="__reserved-to _nav-content-child">
                                <div class="__reserved-to_wrapper">
                                    <div class="__booking-name"><?php echo $book->name . ' ' . $book->last_name; ?></div>
                                    <div class="__booking-name"><?php echo $book->address . ' ' . $book->municipality . ' Cam Sur'; ?></div>
                                    <?php echo "Date Reserved : " . $newDate = date('M d, Y', strtotime($book->start_date_rent)) . ' to ' .$newDate = date('M d, Y', strtotime($book->upto_date)); ?>
                                </div>
                            </div>
                            <div class="__status _nav-content-child">
                                <div class="status">
                                    <p><?php echo "Time to Deliver : {$book->time_rent}" ?></p>
                                    <p><?php echo  "Remaining Time : 24:00 hrs"?></p>
                                </div>
                            </div>
                            <div class="__actions _nav-content-child">
                                <ul>
                                    <li>
                                        <a href="<?php echo URLROOT . "/bookings/edit/{$book->id}"?>">EDIT&nbsp; &nbsp; &nbsp; &nbsp;<i class="fa fa-edit"></i></a>
                                        <a href="">DELETE <i class="fa fa-trash"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>