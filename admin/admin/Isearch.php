<?php
include('includes/header.php');

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>Having troubles finding an event? Search here!😀. search for any event here with the search bar bellow!..</h4>
                    <h5>You can search for an event by the following below:</h5>
                    <span>Event Name, Event Date(y,m,d), Event Location, Event Price.</span>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-7">

                            <form action="" method="GET">
                                <div class="input-group mb-3">
                                    <input type="text" required class="form-control" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" placeholder="Search data">
                                    <button type="submit" class="btn btn-primary" name="">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body row">
                    <?php 
                        if(isset($_GET['search'])){
                            $searchItem = $_GET['search'];
                            if($searchItem != ''){
                            
                                $query = "SELECT * FROM events WHERE CONCAT(title,date,location,price) LIKE '%$searchItem%'";
                                $query_run = mysqli_query($conn, $query);
        
                                if(mysqli_num_rows($query_run) > 0){
                                        foreach($query_run as $item){
                                            ?>
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="images_main">
                                                    <div class="image_1"><img src="administrator../<?= $item['image']; ?>" class="image_1 rounded"></div>
                                                    <div class="text_main">
                                                        <h2 class="business_text"><?= $item['title']; ?></h2>
                                                        <p class="date_text"><?= $item['date']; ?></p>
                                                    </div>
                                                    <p class="ipsum_text" style="height: 6rem; overflow: hidden;"><?= $item['main_description']; ?></p>
                                                    <div class="seemor_bt_1"><a href="seemore.php?id=<?= $item['id']; ?>">See More</a></div>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                            <div class="col-lg-3"><h4>No Record Found</h4></div>
                                        <?php
                                    }
                            }else{
                                ?>
                                    <div class="col-lg-3"><h4>Search For an Invent</h4></div>
                                <?php
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>