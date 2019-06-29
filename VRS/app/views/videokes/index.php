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
                <li> <div class="ui-left"></div> <a href="<?php echo URLROOT ?>/bookings"> <i class="fa fa-window-restore active-itag"></i> BOOKING</a></li>
                <li> <div class="ui-left"></div> <a href=""> <i class="fa fa-calendar-day active-itag"></i> SCHEDULE</a></li>
                <li> <div class="ui-left"></div> <a href=""> <i class="fa fa-ruble-sign active-itag"></i> INCOME</a></li>
                <li> <div class="ui-left active"></div> <a href="<?php echo URLROOT . "/videokes"?>" class="active-atag"> <i class="fa fa-tv"></i> VIDEOKE</a></li>
            </ul>
        </div>
        <!-- Right content -->
        <div class="main-content booking-content">
            <div class="nav-tabs">
                <a href="<?php echo URLROOT; ?>/videokes" class="_tab _tab__active"><?php echo $data['title']; ?></a>
                <!-- <div class="splitter"></div> -->
                <a href="<?php echo URLROOT; ?>/videokes/add"  class="btn_" id="btn_"> <i class="fa fa-plus"></i> Add Book</a>
            </div>

            <div class="bookings-result">
                <div class="header">
                    <div class="__flex __header-name"><p>VIDEOKE NAME</p></div>
                    <div class="__flex __header-client"><p>DVD MODEL/TYPE</p></div>
                    <div class="__flex __header-date-reserved"><p>COLOR</p></div>
                    <div class="__flex __header-time"><p>YEAR</p></div>
                    <div class="__flex __header-time"><p>ACTIONS</p></div>
                </div>
                <!-- Results -->
                <div>   <!-- Data displayed for the results -->
                    <?php foreach($data['videokes'] as $vid) : ?>
                        <div class="__result">
                            <div class="__flex __result-name">
                                <?php 
                                    echo "<h3>{$vid->name}</h3>";
                                    ?>
                            </div>
                            <div class="__flex __result-client">
                                <?php 
                                    echo "<p>{$vid->dvd_model}</p>";
                                ?>

                            </div>
                            <div class="__flex __result-date-reserved">
                                <?php 
                                    echo "<p>{$vid->color}</p>";
                                ?>
                            </div>
                            <div class="__flex __result-date-reserved">
                                <?php 
                                    echo "<p>{$vid->year}</p>";
                                ?>
                            </div>
                            <div class="__flex __result-control">
                                <div class="__control-btn">
                                    <a href="<?php echo URLROOT; ?>/videokes/edit/<?php echo $vid->id; ?>" class="btn_edit"> <i class="fa fa-edit"></i> </a>
                                    |
                                    <a href="<?php echo URLROOT . "/videokes/delete/{$vid->id}"; ?>" class="btn_delete"><i class="fa fa-trash"></i> </a href="<?php echo URLROOT . "/videokes/delete/{$vid->id}"; ?>">
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