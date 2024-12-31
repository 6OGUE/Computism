<?php
session_start();
include '../CONNECTION/DbConnection.php';
include 'userHeader.php';
$centerid = $_GET['sid'];
$uid = $_SESSION['uid'];
?>


<section class="w3l-blog">
    <div class="blog py-5" id="Newsblog">
        <div class="container py-lg-5 py-md-4 py-2">
            <div class="title-content text-center mb-lg-3 mb-4">
                <h6 class="title-subw3hny mb-1">Products</h6>
                <h3 class="title-w3l mb-5">Products <br></h3>
            </div>

            <div class="row justify-content-center">
                <?php
                $res = mysqli_query($conn, "SELECT * FROM tb_product WHERE centerid='$centerid'");
                while ($rs = mysqli_fetch_array($res)) {
                ?>
                    <div class="col-lg-4 col-md-6 item">
                        <div class="card">
                            <div class="card-header p-0 position-relative">
                                <a href="#blog" class="zoom d-block">
                                    <img class="card-img-bottom d-block" src="../assets/image//<?php echo $rs['image'] ?>" alt="Card image cap">
                                </a>
                            </div>
                            <div class="card-body blog-details">

                                <a href="#blog" class="blog-desc"><?php echo $rs['productname'] ?></a>
                                <p>💲 <?php echo $rs['price'] ?></p>
                                <p>Warranty <?php echo $rs['warranty']; ?> /- Months </p>
                                <p> <?php echo $rs['features'] ?></p>
                            </div>
                            <div class="card-footer">
                                <div class="author align-items-center">
                                    <a href="#author" class="post-author">
                                        <!-- <img src="assets/images/team1.jpg" alt="" class="img-fluid rounded-circle"> -->
                                    </a>
                                    <ul class="blog-meta">
                                        <li>
                                            <span class="meta-value"></span><a href="AddtoCartProcess.php?pid=<?php echo $rs['productcode'] ?>&cusid=<?php echo $uid ?>&centerid=<?php echo $centerid ?>&item=<?php echo $rs['productname'] ?>" class="btn btn-success" style="color: white; margin-left:50px;"> Add To Cart</a>
                                            <!--  <span class="meta-value"></span><a href="StatusAction.php?sid=<?php echo $rs['reg_id'] ?>&status=Rejected" class="btn btn-danger" style="color: white; margin-left:10px;"> Reject</a> -->
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php

                }
                ?>

            </div>

        </div>
    </div>
</section>





<?php
include '../COMMON/commonfooter.php';
?>