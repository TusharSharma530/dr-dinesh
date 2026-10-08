<?php require_once 'database/db.php';
$title = 'Edit Gallery Image';
if(!isset($_SESSION['username'])){
	echo "<script>window.location.href='{$path}manager'</script>";
}

$id = intval($_GET['id'] ?? 0);
$sqlgimg = mysqli_query($con, "SELECT * FROM `gallery_imgs` WHERE id = $id");
if(mysqli_num_rows($sqlgimg)){
	$rwgimg = mysqli_fetch_assoc($sqlgimg);
}else{
	echo "<script>window.location.href='gallery.php'</script>";
	exit();
}

if(isset($_POST['editRecord'])){
	$imgtitle = trim(mysqli_real_escape_string($con, $_POST['title'] ?? ""));
	$ordering = intval($_POST['ordering'] ?? 0);
	$gallerycategory = $_POST['category'] ?? "";
	$allowedcategory = array('rooms','venues','pool','lobby','staff');
	if(!in_array($gallerycategory, $allowedcategory, true)){
		$gallerycategory = "";
	}

	$uploadpath = $rwgimg['file'];
	if(!empty($_FILES['img']['name']) && $_FILES['img']['error'] == UPLOAD_ERR_OK){
		$targetdir = dirname(__DIR__)."/branch/assets/gallery_img/";
		if(!is_dir($targetdir)){
			mkdir($targetdir, 0777, true);
		}
		$ext = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));
		$gallery_imagename = round(microtime(true)).'0.'.$ext;
		if(move_uploaded_file($_FILES['img']['tmp_name'], $targetdir.$gallery_imagename)){
			$oldfile = dirname(__DIR__)."/".$rwgimg['file'];
			if(file_exists($oldfile)){
				unlink($oldfile);
			}
			$uploadpath = "branch/assets/gallery_img/".$gallery_imagename;
		}
	}

	$sqlcheck = mysqli_query($con,"UPDATE `gallery_imgs` SET `file` = '$uploadpath', `title` = '$imgtitle', `ordering` = '$ordering', `category` = '$gallerycategory' WHERE id = $id");

	if($sqlcheck){
		echo "<script>swal('Update Successfully', 'Click `OK` to Close', 'success'); </script>";
	}else{
		echo "<script>swal('Failed', 'Click `OK` to try Again', 'error'); </script>";
	}

	exit();
}

include 'include/header.php';
include 'include/sidebar.php';

 ?>

<section class="main-dashboard">
<div class="container-fluid">
<div class="row">

<div class="col-md-12">
	<div class="page-title">
		<div class="title">
			<h3><?=$title;?></h3>
		</div>
		<div class="createbtn">
			<a href="addgalleryimages.php"> Add New</a>
			<a href="gallery.php"> List</a>
		</div>		
	</div>
</div>

<div class="col-md-12">
	<div class="page-content">
		<div class="msgbox"></div>
		<form method="POST" id="submitForm" enctype="multipart/form-data" class="row">		
			<div class="mb-3 col-md-6">
				<label for="title" class="form-label">Title</label>
				<input type="text" class="form-control" name="title" value="<?=$rwgimg['title'];?>">
			</div>

			<div class="mb-3 col-md-6">
				<label for="ordering" class="form-label">Order</label>
				<input type="number" class="form-control" name="ordering" min="0" value="<?=$rwgimg['ordering'];?>">
			</div>

			<div class="mb-3 col-md-6">
				<label for="category" class="form-label">Category</label>
				<select class="form-control" name="category" id="category">
					<option value="">Select Category</option>
					<?php $categoryoptions = array('rooms'=>'Rooms','venues'=>'Venues','pool'=>'Pool','lobby'=>'Lobby','staff'=>'Staff');
					foreach($categoryoptions as $ckey => $clabel){ ?>
					<option value="<?=$ckey;?>"<?=$rwgimg['category'] == $ckey ? ' selected' : '';?>><?=$clabel;?></option>
					<?php } ?>
				</select>
			</div>

			<div class="mb-3 col-md-12">
			  	<label for="formFile" class="form-label">Image</label>
			  	<div class="imgquestion other">
			  		<?php $active = empty($rwgimg['file']) ? "" : "active"; ?>
					<a href="javascript:" class="imgclose ri-close-circle-line <?=$active;?>"></a>
					<input hidden class="form-control imgInput" name="img" type="file">
					<?php if(empty($rwgimg['file'])){ ?>
					<img src="images/preview.jpg" alt="preview" class='preview'>
			  		<?php }else{ ?>
					<img src="<?=$path.$rwgimg['file'];?>" alt="<?=$rwgimg['file'];?>" class='preview'>
			  		<?php } ?>
				</div>
			</div>

			<div class="col-md-12">
				<input type="submit" value="Edit Record" name="editRecord" class="submitInput">
			</div>
		</form>
	</div>
</div>
					
</div>
</div>
</section>

	
<?php 
	include "include/footer.php"; 
?>
