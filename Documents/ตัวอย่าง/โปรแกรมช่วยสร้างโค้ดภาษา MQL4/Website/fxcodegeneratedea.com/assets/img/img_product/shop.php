<?php 
session_start();


// $_SESSION['user'] = 'ken';
 // $_SESSION["user"]['userID'] //เรียกใช้ SESSION ในหน้าอื่น
 // echo  $_SESSION["user"]['userID'] ;
?>
<?php require "connectDB.php";?>
<?php require "head.php";?>
<style type="text/css">
  .p0-h180{
    padding: 0px;height:180px;
  }
</style>

<body class="bg supermarket">
  <div class="container" >


    <?php

    if(isset($_GET['msg'])){
      ?>

      <div class="alert alert-dismissible" id="success-alert" style="position: absolute;z-index: 1;left:0;right:0;background-color:#f879a082;color: #ffffff;">

        
         <center><?=$_GET['msg'] ?> </center>
      </div>

      <?php
    }

    ?>

    <div class="row">
     <div class="col-xs-10 col-xs-offset-1">
       <div style="background-color: #ffffff;">
         <?php require "user_menu.php";?>
         <div class="row">
           <div class="col-md-3">
             <?php require "user_menu_bar.php";?>
           </div>
           <div class="col-md-9">
            <!--gallery-->
            <section class="gallery-container">
              <div class="row">
                <div id="myTabContent" class="tab-content">
                  <div class="tab-pane fade active  in" id="type1">
                    <div class="row">
                      <?php
                      $id = 1;
                      $sql = "SELECT * FROM product WHERE pro_type = 'ผ้าไหม' ";
                      $result = mysqli_query($conn,$sql );
                      while($row = mysqli_fetch_array($result)){
                        ?>
                        <div class="col-md-4">
                          <div class="panel panel-default">
                            <div class="panel-body p0-h180">
                             <div class="gallery">
                               <img width="100%" height="180px" src="assets/img/img_product/<?=$row['pro_img'];?>">
                               <!-- <img src="assets/img/001.jpg" alt="" class="img-responsive" style="height:180px;width:100%;"> -->
                               <div class="gallery-overlay" style="background-color: rgba(0, 235, 235, 0.31);">
                                <a href="assets/img/img_product/<?=$row['pro_img'];?>" data-lightbox="gallery">
                                 <i class="fa fa-search-plus"></i>
                               </a>
                             </div>
                           </div>
                         </div>
                         <div class="panel-footer">
                           <a href=""><?=$row['pro_name'];?></a><br>  
                           <small class="f13"><i class="fa fa-clock-o"></i> <?=$row['pro_date']?></small>
                           <!-- login -->
          <?php
          if (isset($_SESSION['member'])) { 
            ?>
                           <a href="shop_detail.php?id=<?=$row['id'];?>" class="btn btn-info btn-xs f17"><i class="fa fa-shopping-basket"></i> ดูรายละเอียด</a><br>
                           <?php
          }else{
            ?>
            <?php }?>



                           <i><s class="f15">฿<?=$row['pro_price_dis']?></s></i> <b><span class="f17">฿<?=$row['pro_price']?></span></b>
                         </div>
                       </div>
                     </div>
                     <?php } ?>
                   </div>
                 </div>
                 <div class="tab-pane fade" id="type2">
                  <div class="row">
                   <?php
                   $id = 1;
                   $sql = "SELECT * FROM product WHERE pro_type = 'ผ้าฝ้าย' ";
                   $result = mysqli_query($conn,$sql );
                   while($row = mysqli_fetch_array($result)){
                    ?>
                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-body p0-h180">
                         <div class="gallery">
                           <img width="100%" height="180px" src="assets/img/img_product/<?=$row['pro_img'];?>">
                           <!-- <img src="assets/img/001.jpg" alt="" class="img-responsive" style="height:180px;width:100%;"> -->
                           <div class="gallery-overlay" style="background-color: rgba(0, 235, 235, 0.31);">
                            <a href="assets/img/img_product/<?=$row['pro_img'];?>" data-lightbox="gallery">
                             <i class="fa fa-search-plus"></i>
                           </a>
                         </div>
                       </div>
                     </div>
                     <div class="panel-footer">
                       <a href=""><?=$row['pro_name'];?></a><br>  
                       <small class="f13"><i class="fa fa-clock-o"></i> <?=$row['pro_date']?></small>

                        <?php
          if (isset($_SESSION['member'])) { 
            ?>
                            <a href="shop_detail.php?id=<?=$row['id'];?>" class="btn btn-info btn-xs f17"><i class="fa fa-shopping-basket"></i> ดูรายละเอียด</a><br>
                           <?php
          }else{
            ?>
            <?php }?>

                      
                       <i><s class="f15"><?=$row['pro_price']?></s></i> <b><span class="f17">฿100</span></b>
                     </div>
                   </div>
                 </div>
                 <?php } ?>

               </div>
             </div>
             <div class="tab-pane fade" id="type3">
              <div class="row">
               <?php
               $id = 1;
               $sql = "SELECT * FROM product WHERE pro_type = 'ผ้าฝ้ายผสม' ";
               $result = mysqli_query($conn,$sql );
               while($row = mysqli_fetch_array($result)){
                ?>
                <div class="col-md-4">
                  <div class="panel panel-default">
                    <div class="panel-body p0-h180">
                     <div class="gallery">
                       <img width="100%" height="180px" src="assets/img/img_product/<?=$row['pro_img'];?>">
                       <!-- <img src="assets/img/001.jpg" alt="" class="img-responsive" style="height:180px;width:100%;"> -->
                       <div class="gallery-overlay" style="background-color: rgba(0, 235, 235, 0.31);">
                        <a href="assets/img/img_product/<?=$row['pro_img'];?>" data-lightbox="gallery">
                         <i class="fa fa-search-plus"></i>
                       </a>
                     </div>
                   </div>
                 </div>
                 <div class="panel-footer">
                   <a href=""><?=$row['pro_name'];?></a><br>  
                   <small class="f13"><i class="fa fa-clock-o"></i> <?=$row['pro_date']?></small>
                    <?php
          if (isset($_SESSION['member'])) { 
            ?>
                        <a href="shop_detail.php?id=<?=$row['id'];?>" class="btn btn-info btn-xs f17"><i class="fa fa-shopping-basket"></i> ดูรายละเอียด</a><br>
                           <?php
          }else{
            ?>
            <?php }?>

                
                   <i><s class="f15"><?=$row['pro_price']?></s></i> <b><span class="f17">฿100</span></b>
                 </div>
               </div>
             </div>
             <?php } ?>

           </div>
         </div>

         <div class="tab-pane fade" id="type4">
          <div class="row">
           <?php
           $id = 1;
           $sql = "SELECT * FROM product WHERE pro_type = 'ผ้าเรยอน' ";
           $result = mysqli_query($conn,$sql );
           while($row = mysqli_fetch_array($result)){
            ?>
            <div class="col-md-4">
              <div class="panel panel-default">
                <div class="panel-body p0-h180">
                 <div class="gallery">
                   <img width="100%" height="180px" src="assets/img/img_product/<?=$row['pro_img'];?>">
                   <!-- <img src="assets/img/001.jpg" alt="" class="img-responsive" style="height:180px;width:100%;"> -->
                   <div class="gallery-overlay" style="background-color: rgba(0, 235, 235, 0.31);">
                    <a href="assets/img/img_product/<?=$row['pro_img'];?>" data-lightbox="gallery">
                     <i class="fa fa-search-plus"></i>
                   </a>
                 </div>
               </div>
             </div>
             <div class="panel-footer">
               <a href=""><?=$row['pro_name'];?></a><br>  
               <small class="f13"><i class="fa fa-clock-o"></i> <?=$row['pro_date']?></small>
                <?php
          if (isset($_SESSION['member'])) { 
            ?>
                  <a href="shop_detail.php?id=<?=$row['id'];?>" class="btn btn-info btn-xs f17"><i class="fa fa-shopping-basket"></i> ดูรายละเอียด</a><br>
                           <?php
          }else{
            ?>
            <?php }?>
              
               <i><s class="f15"><?=$row['pro_price']?></s></i> <b><span class="f17">฿100</span></b>
             </div>
           </div>
         </div>
         <?php } ?>

       </div>
     </div>
     <div class="tab-pane fade" id="type5">
      <div class="row">
        <?php
        $id = 1;
        $sql = "SELECT * FROM product WHERE pro_type = 'ผ้าไหมจีน' ";
        $result = mysqli_query($conn,$sql );
        while($row = mysqli_fetch_array($result)){
          ?>
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-body p0-h180">
               <div class="gallery">
                 <img width="100%" height="180px" src="assets/img/img_product/<?=$row['pro_img'];?>">
                 <!-- <img src="assets/img/001.jpg" alt="" class="img-responsive" style="height:180px;width:100%;"> -->
                 <div class="gallery-overlay" style="background-color: rgba(0, 235, 235, 0.31);">
                  <a href="assets/img/img_product/<?=$row['pro_img'];?>" data-lightbox="gallery">
                   <i class="fa fa-search-plus"></i>
                 </a>
               </div>
             </div>
           </div>
           <div class="panel-footer">
             <a href=""><?=$row['pro_name'];?></a><br>  
             <small class="f13"><i class="fa fa-clock-o"></i> <?=$row['pro_date']?></small>
              <?php
          if (isset($_SESSION['member'])) { 
            ?>
             <a href="shop_detail.php?id=<?=$row['id'];?>" class="btn btn-info btn-xs f17"><i class="fa fa-shopping-basket"></i> ดูรายละเอียด</a><br>
                       <?php
          }else{
            ?>
            <?php }?>
            
             <i><s class="f15"><?=$row['pro_price']?></s></i> <b><span class="f17">฿100</span></b>
           </div>
         </div>
       </div>
       <?php } ?>

     </div>
   </div>
   <div class="tab-pane fade" id="type6">
    <div class="row">
     <?php
     $id = 1;
     $sql = "SELECT * FROM product WHERE pro_type = 'ผ้าเหยื่อไผ่' ";
     $result = mysqli_query($conn,$sql );
     while($row = mysqli_fetch_array($result)){
      ?>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-body p0-h180">
           <div class="gallery">
             <img width="100%" height="180px" src="assets/img/img_product/<?=$row['pro_img'];?>">
             <!-- <img src="assets/img/001.jpg" alt="" class="img-responsive" style="height:180px;width:100%;"> -->
             <div class="gallery-overlay" style="background-color: rgba(0, 235, 235, 0.31);">
              <a href="assets/img/img_product/<?=$row['pro_img'];?>" data-lightbox="gallery">
               <i class="fa fa-search-plus"></i>
             </a>
           </div>
         </div>
       </div>
       <div class="panel-footer">
         <a href=""><?=$row['pro_name'];?></a><br>  
         <small class="f13"><i class="fa fa-clock-o"></i> <?=$row['pro_date']?></small>
          <?php
          if (isset($_SESSION['member'])) { 
            ?>
             <a href="shop_detail.php?id=<?=$row['id'];?>" class="btn btn-info btn-xs f17"><i class="fa fa-shopping-basket"></i> ดูรายละเอียด</a><br>
                       <?php
          }else{
            ?>
            <?php }?>
         <i><s class="f15"><?=$row['pro_price']?></s></i> <b><span class="f17">฿100</span></b>
       </div>
     </div>
   </div>
   <?php } ?>

 </div>
</div>


</div>
</div>
</section>
<!--end gallery-->
<!-- <div align="right">
  <ul class="pagination pagination-sm">
    <li class="disabled"><a href="#"><i class="fa fa-chevron-left"></i></a></li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
  </ul>
</div> -->
</div>
</div><!--  small-row -->
</div><!-- white -->
</div><!-- col-xs-10 -->
</div><!-- row -->
</div><!-- container -->
<script src="assets/lightbox2-master/dist/js/lightbox.js"></script>

<script type="text/javascript">
  $(document).ready(function(){


$("#success-alert").fadeTo(2000, 500).fadeOut(500, function(){
    $("#success-alert").alert('close');
});

  });
</script>

</body>
</html>