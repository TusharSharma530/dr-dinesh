<?php require_once 'database/db.php';
$title = 'Contact';
if(!isset($_SESSION['username'])){
		echo "<script>window.location.href='{$path}manager'</script>";
	}
	
	if(isset($_POST['deletedata'])){
		$id = $_POST['id'];
		$sqldelete = mysqli_query($con,"DELETE FROM contact WHERE id = {$id}");
		if($sqldelete){
			echo 'true';
		}else{
			echo 'false';
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
			<h3>Contact</h3>
		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="page-content">
	<div class="msgbox"></div>
	<table class="table table-hover" id="myTable">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Email ID</th>
				<th>Phone</th>
				<th>Enquiry Type</th>
				<th>Message</th>
				<th>Status</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
		<?php 

			$sqlcontact  = mysqli_query($con, "SELECT * FROM contact ORDER BY id DESC");
			if(mysqli_num_rows($sqlcontact)){
				$serial = 1;
				while($rwcontact = mysqli_fetch_assoc($sqlcontact )){
					$cid = $rwcontact['id'];
		 ?>
			<tr id='remove<?php echo $cid; ?>'>
				<td><?php echo $serial; ?></td>									
				<td><?php echo htmlspecialchars((string)$rwcontact['name'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?php echo htmlspecialchars((string)$rwcontact['email'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td><?=htmlspecialchars((string)$rwcontact['phone'], ENT_QUOTES, 'UTF-8');?></td>
				<td><?php echo htmlspecialchars((string)$rwcontact['enquiry_type'], ENT_QUOTES, 'UTF-8'); ?></td>
				<td style="word-break: break-word;"><?php $enqMsg = (string)$rwcontact['message']; $enqShort = mb_substr($enqMsg, 0, 140, 'UTF-8'); if (mb_strlen($enqMsg, 'UTF-8') > 140) { $enqShort .= '...'; } echo htmlspecialchars($enqShort, ENT_QUOTES, 'UTF-8'); ?></td>		
				<td>
					<div class="form-check form-switch">
						<?php $checked = $rwcontact['status']==1 ? "checked" : ""; ?>
					  <input class="form-check-input" type="checkbox" data-table="contact" ide="<?=$rwcontact['id'];?>" <?=$checked;?>>
					  <label class="form-check-label" for="status"></label>
					</div>
				</td>						
				<td class="text-center"> 
					<a href="javascript:" class="editbtn ri-eye-line viewEnquiry" title="View enquiry" data-type="<?php echo htmlspecialchars((string)$rwcontact['enquiry_type'], ENT_QUOTES, 'UTF-8'); ?>" data-name="<?php echo htmlspecialchars((string)$rwcontact['name'], ENT_QUOTES, 'UTF-8'); ?>" data-email="<?php echo htmlspecialchars((string)$rwcontact['email'], ENT_QUOTES, 'UTF-8'); ?>" data-phone="<?php echo htmlspecialchars((string)$rwcontact['phone'], ENT_QUOTES, 'UTF-8'); ?>" data-status="<?php echo (int)$rwcontact['status']; ?>" data-message="<?php echo str_replace(array("\r\n", "\r", "\n"), '&#10;', htmlspecialchars((string)$rwcontact['message'], ENT_QUOTES, 'UTF-8')); ?>"></a>
					<a href="javascript:"  ide="<?=$cid;?>" class='delbtn ri-delete-bin-line' ></a>
				</td>
			</tr>
	<?php $serial++; }} ?>
		</tbody>
	</table>
	</div>
</div>

</div>
</div>
</section>

<!-- Enquiry view modal -->
<div class="modal" id="enqView" tabindex="-1" role="dialog" aria-labelledby="enqViewTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="enqViewTitle">Enquiry Details</h5>
				<button type="button" class="btn-close" id="enqCloseBtn" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6 mb-3">
						<small class="text-muted text-uppercase">Enquiry Type</small>
						<div class="fw-semibold" id="enqType">-</div>
					</div>
					<div class="col-md-6 mb-3">
						<small class="text-muted text-uppercase">Status</small>
						<div class="fw-semibold" id="enqStatus">-</div>
					</div>
					<div class="col-md-6 mb-3">
						<small class="text-muted text-uppercase">Name</small>
						<div class="fw-semibold" id="enqName">-</div>
					</div>
					<div class="col-md-6 mb-3">
						<small class="text-muted text-uppercase">Phone</small>
						<div class="fw-semibold" id="enqPhone">-</div>
					</div>
					<div class="col-12 mb-3">
						<small class="text-muted text-uppercase">Email</small>
						<div class="fw-semibold" id="enqEmail">-</div>
					</div>
					<div class="col-12">
						<small class="text-muted text-uppercase">Message</small>
						<div class="border rounded bg-light p-3 mt-1" style="white-space: pre-line; word-break: break-word;" id="enqMessage">-</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary btn-sm" id="enqCloseBtn2">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal-backdrop" id="enqBackdrop" style="display:none"></div>

<?php 
	include "include/footer.php"; 
?>



<script>
    var url = window.location.href;

	// ---- View enquiry (eye icon) ----
	function enqViewOpen(){
		$('#enqView').addClass('show').attr('aria-hidden','false').css('display','block');
		$('#enqBackdrop').addClass('show').css('display','block');
		$('body').addClass('modal-open');
	}
	function enqViewClose(){
		$('#enqView').removeClass('show').attr('aria-hidden','true').css('display','none');
		$('#enqBackdrop').removeClass('show').css('display','none');
		$('body').removeClass('modal-open');
	}
	$(document).on('click', '.viewEnquiry', function(e){
		e.preventDefault();
		var $el = $(this);
		$('#enqType').text($el.attr('data-type') || '-');
		$('#enqStatus').text(String($el.attr('data-status')) === '1' ? 'Active' : 'New');
		$('#enqName').text($el.attr('data-name') || '-');
		$('#enqPhone').text($el.attr('data-phone') || '-');
		$('#enqEmail').text($el.attr('data-email') || '-');
		$('#enqMessage').text($el.attr('data-message') || '-');
		enqViewOpen();
	});
	$(document).on('click', '#enqCloseBtn, #enqCloseBtn2, #enqBackdrop', function(e){
		e.preventDefault();
		enqViewClose();
	});
	$(document).on('click', '#enqView', function(e){
		if (!$(e.target).closest('.modal-content').length) { enqViewClose(); }
	});
	$(document).on('keydown', function(e){
		if (e.key === 'Escape') { enqViewClose(); }
	});

     $(document).on("click", ".status_btn", function(){
 	var $this = $(this).attr('ide');
    // alert($this);
 	$.ajax({
 		url : url,
 		type : "POST",
 		data : {ide : $this, st : 1},
 		success : function(data){
 			location.reload();
 		}
 	})

 });
</script>