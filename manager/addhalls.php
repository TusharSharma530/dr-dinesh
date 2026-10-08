<?php require_once 'database/db.php';
$title = 'Add Halls';
if(!isset($_SESSION['username'])){
	echo "<script>window.location.href='{$path}manager'</script>";
}

$id = $_GET['id'] ?? "";

if(isset($_POST['deletedata'])){
	$id = $_POST['id'];
	$sqldelImg = mysqli_query($con, "SELECT * FROM `halls` WHERE id = $id");
	if(mysqli_num_rows($sqldelImg)){
		$rowimg = mysqli_fetch_assoc($sqldelImg);
		$imgid = $rowimg['file'];

		if(!empty($imgid) && file_exists("../".$imgid)){
			unlink("../".$imgid);
		}

		$sqldelete = mysqli_query($con,"DELETE FROM `halls` WHERE id = $id");
		if($sqldelete){
			echo 'true';
		}else{
			echo 'false';
		}
	}

	exit();
}

if(isset($_POST['addRecord'])){

	$sqlins = "";
	$i = 0;

	$imgtitle = mysqli_real_escape_string($con, $_POST['title'] ?? "");
	$subtitle = mysqli_real_escape_string($con, $_POST['subtitle'] ?? "");
	$description = mysqli_real_escape_string($con, $_POST['description'] ?? "");
	$ordering = intval($_POST['ordering'] ?? 0);
	$status = 1;

	$targetdir = dirname(__DIR__)."/branch/assets/halls_img/";

	if(!is_dir($targetdir)){
		mkdir($targetdir, 0777, true);
	}

	if(isset($_FILES['img']['name']) && is_array($_FILES['img']['name'])){

		foreach ($_FILES['img']['name'] as $row => $name){

			if(empty($name)){
				$i++;
				continue;
			}

			$halls = $name;
			$extension = strtolower(pathinfo($halls, PATHINFO_EXTENSION));

			$halls_imagename = round(microtime(true)) .$i. '.' . $extension;

			$uploadpath = "branch/assets/halls_img/".$halls_imagename;

			if(move_uploaded_file(
				$_FILES["img"]["tmp_name"][$i],
				$targetdir . $halls_imagename
			)){

				$sqlins = mysqli_query(
					$con,
					"INSERT INTO `halls`
					(`id`, `file`, `title`, `subtitle`, `description`, `ordering`, `status`)
					VALUES
					(NULL, '$uploadpath', '$imgtitle', '$subtitle', '$description', '$ordering', '$status')"
				);
			}

			$i++;
		}
	}

	if($sqlins){

		echo "<script>
			swal('Added Successfully', 'Click `OK` to Close', 'success');
			$('#submitForm').hide();
		</script>";

		echo "<div class='col-md-12 padd0 text-center'>
			<a href='addhalls.php?id=$id' class='btn btn-primary'>Create New</a>
		</div>";

	}else{

		echo "<script>
			swal('Failed', 'Click `OK` to try Again', 'error');
			$('#submitForm').show();
		</script>";
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
			<h3>Add Halls</h3>
		</div>

		<div class="createbtn">
			<a href="halls.php">List</a>
		</div>
	</div>
</div>

<div class="col-md-12">
<div class="page-content">

	<div class="msgbox"></div>

	<form method="POST" id="submitForm" enctype="multipart/form-data">

		<div class="row">

			<div class="mb-3 col-md-6">
				<label for="title" class="form-label">Title</label>
				<input 
					type="text" 
					name="title" 
					id="title" 
					class="form-control" 
					placeholder="e.g. Diamond Hall"
					required
				>
			</div>

			<div class="mb-3 col-md-6">
				<label for="subtitle" class="form-label">Subtitle</label>
				<input 
					type="text" 
					name="subtitle" 
					id="subtitle" 
					class="form-control" 
					placeholder="e.g. Premium Event Hall"
				>
			</div>

			<div class="mb-3 col-md-6">
				<label for="ordering" class="form-label">Order</label>
				<input 
					type="number" 
					name="ordering" 
					id="ordering" 
					class="form-control" 
					value="0" 
					min="0"
				>
			</div>

			<div class="mb-3 col-md-12">
				<label for="description" class="form-label">Description</label>
				<textarea 
					name="description" 
					id="description" 
					class="form-control" 
					rows="5" 
					placeholder="Enter description"
				></textarea>
			</div>

			<div class="mb-3 col-md-12">

				<label for="formFile" class="form-label">Image</label>

				<div class="clearallimgdiv" style="display: none;">
					<a href="javascript:" id="clrimgs">Clear All</a>
				</div>

				<div class="imgquestion other">

					<a href="javascript:" class="imgclose ri-close-circle-line <?=$active;?>"></a>

					<input 
						hidden 
						class="form-control imgInputMultiple" 
						name="img[]" 
						type="file" 
						multiple
					>

					<img 
						src="images/preview.jpg" 
						alt="2" 
						class="preview"
					>

				</div>

				<div id="gal-container"></div>

			</div>

			<div class="col-md-12">
				<input 
					type="submit" 
					value="Add Record" 
					name="addRecord" 
					class="submitInput"
				>
			</div>

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
