<?php require "ad_menu.php" ;?>
<?php require  "connectDB.php" ;?>
<?php
$id = $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM product WHERE id =$id");

$row = $result->fetch_assoc();
?>

<div class="container">
	<div class="row">
		<form class="form-horizontal" action="c_check_product_edit.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend><i class="fa fa-pencil-square-o" aria-hidden="true"></i> แก้ไขรายการสินค้า</legend>
				<div class="form-group">
					<label for="inputEmail" class="col-lg-3 control-label">ชื่อสินค้า</label>
					<div class="col-lg-5">
						<input type="text" class="form-control" id="pro_name" name="pro_name" value="<?=$row["pro_name"]?>">
					</div>
					<div class="col-lg-4"></div>
				</div>
				<div class="form-group">
				<label for="textArea" class="col-lg-3 control-label">รายละเอียด</label>
					<div class="col-lg-5">
						<textarea class="form-control" rows="3" id="pro_detail" name="pro_detail"><?=$row["pro_detail"]?></textarea>
					</div>
					<div class="col-lg-4"></div>
				</div>
				<div class="form-group">
					<label for="select" class="col-lg-3 control-label">ประเภทสินค้า</label>
					<div class="col-lg-5">
						<select class="form-control" id="pro_type" name="pro_type" value="<?=$row["pro_type"]?>">
							<option value="ผ้าไหม">ผ้าไหม</option>
							<option value="ผ้าฝ้าย">ผ้าฝ้าย</option>
							<option value="ผ้าฝ้ายผสม">ผ้าฝ้ายผสม</option>
							<option value="ผ้าเรยอน">ผ้าเรยอน</option>
							<option value="ผ้าไหมจีน">ผ้าไหมจีน</option>
							<option value="ผ้าเหนื่อไผ่">ผ้าเหนื่อไผ่</option>
						</select>
					</div>
					<div class="col-lg-4"></div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-lg-3 control-label">ราคา (ผืน)</label>
					<div class="col-lg-5">
						<input type="text" class="form-control" id="pro_price" name="pro_price" value="<?=$row["pro_price"]?>">
					</div>
					<div class="col-lg-4"></div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-lg-3 control-label">ราคาเดิม</label>
					<div class="col-lg-5">
						<input type="text" class="form-control" id="pro_price_dis" name="pro_price_dis" value="<?=$row["pro_price_dis"]?>">
					</div>
					<div class="col-lg-4"></div>
				</div>
				<div class="form-group">
					<label for="select" class="col-lg-3 control-label">สถานะสินค้า</label>
					<div class="col-lg-5">
						<select class="form-control" id="pro_status" name="pro_status" value="<?=$row["pro_status"]?>">
							<option value="สินค้าพร้อมส่ง">สินค้าพร้อมส่ง</option>
							<option value="สินค้าหมด">สินค้าหมด</option>
						</select>
					</div>
					<div class="col-lg-4"></div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">เลือกรูปภาพ</label>
					<div class="col-lg-5">
						<input type="file" id="u_imgname" name="filUpload" value="<?=$row["pro_img"]?>">
						<p class="help-block">ขนาดรูปภาพไม่เกิน 1MB</p>
						<img style="width:100px;height:100px;" id="imgp" src="assets/img/img_product/<?=$row['pro_img']?>">
					</div>
					<div class="col-lg-4"></div>
				</div>
				<div class="form-group">
					<div class="col-lg-9 col-lg-offset-3">
						<button type="submit" class="btn btn-default">บันทึก</button>
						<a href="ad_product.php" class="btn btn-primary">ยกเลิก</a>
					</div>
				</div>
			</fieldset>
		</form>
	</div><!-- row -->
</div><!-- container -->

<script type="text/javascript">
	$(document).ready(function(){
		function readURL(input,img) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$(img).attr('src', e.target.result);
						//console.log(img);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}

			$("#u_imgname").change(function(){
				readURL(this,'#imgp');
			});
		});
</script>

</body>
</html>