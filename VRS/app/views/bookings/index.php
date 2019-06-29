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
        <div class="main-content booking-content">
            <div class="nav-tabs">
                <a href="<?php echo URLROOT; ?>/bookings" class="_tab _tab__active">Bookings</a>
                <!-- <div class="splitter"></div> -->
                <a href="<?php echo URLROOT; ?>/bookings/add"  class="btn_" id="btn_"> <i class="fa fa-plus"></i> Add Book</a>
            </div>

            <div class="bookings-result">
                <div class="header">
                    <div class="__flex __header-name"><p>VIDEOKE</p></div>
                    <div class="__flex __header-client"><p>NAME & ADDRESS</p></div>
                    <div class="__flex __header-date-reserved"><p>DATE RESERVED</p></div>
                    <div class="__flex __header-time"><p>TOTAL TIME</p></div>
                    <div class="__flex __header-control"><p>ACTIONS</p></div>
                </div>
                <!-- Results -->
                <div>   <!-- Data displayed for the results -->
                    <?php foreach($data['books'] as $book) : ?>
                        <div class="__result">
                            <div class="__flex __result-name">
                                
                                <?php 
                                    if($book->vid_id == 1) {
                                        echo '<p>HYUNDAI</p>';
                                        echo '<p>Player HDT MIDI</p>';
                                    } elseif ($book->vid_id == 2) {
                                        echo '<p>PLATINUM</p>';
                                        echo '<p>Player Reyna 2</p>';
                                    } elseif ($book->vid_id == 3) {
                                        echo '<p>MEGAPRO</p>';
                                        echo '<p>Player MS EZRA</p>';
                                    }
                                ?>
                            </div>
                            <div class="__flex __result-client">
                                <p><?php echo $book->name .' '. $book->last_name; ?></p>
                                <span>Z 7, Angustia, Nabua</span>
                            </div>
                            <div class="__flex __result-date-reserved">
                                <!-- <p>May 30 to May 31, 2019</p> -->
                                <p> <?php echo $newDate = date('M d, Y', strtotime($book->start_date_rent)); 
                                          echo ' to ';
                                          echo $newDate = date('M d, Y', strtotime($book->upto_date)) . "</p>";
                                          echo "<span>Contact No: {$book->contact_no}</span>"; ?>
                            </div>
                            <div class="__flex __result-time" id="result-time">
                                <p>24:00 hrs</p>
                                <p><?php echo "Fee : {$book->fee}"; ?></p>
                            </div>
                            <div class="__flex __result-control">
                                <div class="__control-btn">
                                    <!-- <form action="" method="post">
                                        <input type="hidden" name="book_id" value="<?php echo $book->id; ?>">
                                        <button type="submit" class="btn_edit"><i class="fa fa-edit"></i></button>
                                    </form> -->
                                    <a class="btn_edit" href="<?php echo URLROOT; ?>/bookings/edit/<?php echo $book->id; ?>" class="btn_edit"> <i class="fa fa-edit"></i> </a>
                                    |
                                    <button class="btn_delete" data-id="<?php echo $book->id; ?>"><i class="fa fa-trash"></i> </button>
                                </div>
                            </div>                    
                        </div>
                    <?php endforeach; ?> 
                </div>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>