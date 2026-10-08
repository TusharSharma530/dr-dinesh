<?php require_once 'database/db.php';
$title = "Edit Banner";
	if(!isset($_SESSION['username'])){
		echo "<script>window.location.href='{$path}manager'</script>";
	}
	

$id = $_GET['id'] ?? "";



	$querysel = mysqli_query($con, "SELECT * FROM web_banner WHERE id = $id");
	if(mysqli_num_rows($querysel)){
		$row = mysqli_fetch_assoc($querysel);
	}

	 if(isset($_POST['editRecord'])){
		$order = trim(mysqli_real_escape_string($con,$_POST['order']));
		$category_id = intval($_POST['category_id'] ?? 0);

		if(empty($_FILES['img']['name'])){
			$image = $row['wb_img'];
			$imagepath = $image;
		}else{
			$imagepath = createImgWebp("img", "banner");

		}	

		$sqlins = mysqli_query($con,"UPDATE web_banner SET wb_order = '$order', wb_img = '$imagepath', category_id = '$category_id' WHERE id = $id");
			
		if($sqlins){
			echo "<script>swal('Update Successfully', 'Click `OK` to Close', 'success');  </script>";
		}else{
				
			echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); </script>";
		}
		
		exit();
	}





	include 'include/header.php';
	include 'include/sidebar.php';

 ?>


<section class="main-dashboard" style="overflow: auto; height: 100vh;">
<div class="container-fluid">
<div class="row">

<div class="col-md-12">
	<div class="page-title">
		<div class="title">
			<h3>Edit Banner</h3>
		</div>
		<div class="createbtn">
			<a href="createbanner.php"> Add New</a>
			<a href="banner.php"> List</a>
		</div>
	</div>
</div>


<div class="col-md-12">
	<div class="page-content">
	<div class="msgbox"></div>
	<form method="POST" id="submitForm" class="row">
		<div class="mb-2 col-md-3">
		  	<label for="formFile" class="form-label">Image / Video</label>
		  	<div class="imgquestion other">
				<?php $active = empty($row['wb_img']) ? "" : "active"; ?>
				<a href="javascript:" class="imgclose ri-close-circle-line <?=$active;?>"></a>
				<input hidden class="form-control imgInput" name="img" type="file" accept="image/*,video/*,.jpg,.jpeg,.png,.webp,.gif,.avif,.mp4,.mov,.webm,.avi,.mkv,.3gp">
  				<?php if(empty($row['wb_img'])){ ?>
  				<img src="images/preview.jpg" alt="preview" class='preview'>
  				<?php }else if(preg_match('/\.(mp4|webm|mov|avi|mkv|3gp)$/i', $row['wb_img'])){ ?>
  				<video src="<?=$path.$row['wb_img'];?>" class='preview' controls autoplay muted playsinline></video>
  				<?php }else{ ?>
  				<img src="<?=$path.$row['wb_img'];?>" alt="<?=$row['wb_img'];?>" class='preview'>
  				<?php } ?>
  			</div>
		</div>
		<div class="mb-3 col-md-9">
			<label for="order" class="form-label">Order</label>
			<input type="text" class="form-control" id="order" name="order" value="<?php echo $row['wb_order']; ?>" required>
		</div>

		<div class="mb-3 col-md-6">
			<label for="category_id" class="form-label">Category</label>
			<select class="form-control" id="category_id" name="category_id">
				<option value="0">Select Category</option>
				<?php $sqlbanner_cat = mysqli_query($con, "SELECT id, c_name FROM `category` WHERE `c_type` = 1 ORDER BY id ASC");
				if(mysqli_num_rows($sqlbanner_cat)){
					while($rwbannercat = mysqli_fetch_assoc($sqlbanner_cat)){ ?>
				<option value="<?=$rwbannercat['id'];?>" <?php echo ($row['category_id'] == $rwbannercat['id']) ? 'selected' : ''; ?>><?=$rwbannercat['c_name'];?></option>
				<?php } } ?>
			</select>
		</div>
						
		<div class="col-md-12">
			<input type="submit" name="editRecord" class="submitInput" value="Edit Record">
		</div>
	</form>
	</div>
</div>

</div>
</div>				
</section>

<?php include 'include/footer.php'; ?>