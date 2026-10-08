<?php

require_once 'database/db.php';

$title = 'Update Category';

if (!isset($_SESSION['username'])) {
    echo "<script>window.location.href='{$path}manager'</script>";
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}

$sqlcat = mysqli_query($con, "SELECT * FROM category WHERE id = {$id}");

if (mysqli_num_rows($sqlcat)) {
    $rwcat = mysqli_fetch_assoc($sqlcat);
}

if (isset($_POST['editRecord'])) {

    $cname = trim(mysqli_real_escape_string($con, $_POST['cname']));
    $url = seo_friendly_url($cname);
    $ctype = trim(mysqli_real_escape_string($con, $_POST['ctype']));
    $cdesc = trim(mysqli_real_escape_string($con, $_POST['cdesc']));
    $sdesc = trim(mysqli_real_escape_string($con, $_POST['sdesc']));
    $mtitle = trim(mysqli_real_escape_string($con, $_POST['meta-title']));
    $mkeywords = trim(mysqli_real_escape_string($con, $_POST['meta-keywords']));
    $mdesc = trim(mysqli_real_escape_string($con, $_POST['meta-desc']));
    $iframe = trim(mysqli_real_escape_string($con, $_POST['iframe'] ?? ""));
    $order = trim(mysqli_real_escape_string($con, $_POST['order']));

    if (empty($_FILES['img']['name'])) {

        $image = $rwcat['featured_img'];
        $uploadpath = $image;

    } else {

        $uploadpath = createImgWebp("img", "category");

        if (!empty($rwcat['featured_img'])) {

            if (file_exists("../" . $rwcat['featured_img'])) {
                unlink("../" . $rwcat['featured_img']);
            }

        }
    }

    $sqlcheck = mysqli_query($con, "
        UPDATE category SET
            c_name = '$cname',
            c_url = '$url',
            c_type = '$ctype',
            c_desc = '$cdesc',
            sdesc = '$sdesc',
            featured_img = '$uploadpath',
            meta_title = '$mtitle',
            meta_keywords = '$mkeywords',
            meta_desc = '$mdesc',
            `iframe` = '$iframe',
            `order` = '$order'
        WHERE id = $id
    ");

    if ($sqlcheck) {

        echo "
        <script>
            swal(
                'Update Successfully',
                'Click `OK` to Close',
                'success'
            );
        </script>
        ";

    } else {

        echo "
        <script>
            swal(
                'Failed',
                'Click `OK` to try Again',
                'error'
            );
        </script>
        ";
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
                        <h3>Edit Category</h3>
                    </div>

                    <div class="createbtn">
                        <a href="createcategory.php">Add New</a>
                        <a href="category.php">List</a>
                    </div>

                </div>

            </div>


            <div class="col-md-12">

                <div class="page-content">

                    <div class="msgbox"></div>

                    <form method="POST" id="submitForm" class="row">

                        <!-- Category Name -->
                        <div class="mb-3 col-md-4">

                            <label for="cname" class="form-label">
                                Category Name
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="cname"
                                name="cname"
                                value="<?php echo htmlspecialchars($rwcat['c_name']); ?>"
                                required
                            >

                        </div>


                        <!-- Category Type -->
                       <!-- Category Type -->
						<div class="mb-3 col-md-4">

							<label for="type" class="form-label">
								Category Type
							</label>

							<select
								class="form-control"
								id="type"
								name="ctype"
								required
							>

								<option value="">
									-- Select Category Type --
								</option>

								<!-- Static Top Category -->
								<option
									value="1"
									<?php echo ($rwcat['c_type'] == 1) ? 'selected' : ''; ?>
								>
									Top
								</option>

								<?php

								$sqlctype = mysqli_query(
									$con,
									"SELECT id, c_name
									FROM category
									WHERE c_type = 1
									ORDER BY `order` ASC"
								);

								if (mysqli_num_rows($sqlctype)) {

									while ($rwctype = mysqli_fetch_assoc($sqlctype)) {

								?>

									<option
										value="<?php echo $rwctype['id']; ?>"
										<?php echo ($rwcat['c_type'] == $rwctype['id']) ? 'selected' : ''; ?>
									>
										<?php echo htmlspecialchars($rwctype['c_name']); ?>
									</option>

								<?php

									}

								}

								?>

								<!-- Static Bottom Category -->
								<option
									value="2"
									<?php echo ($rwcat['c_type'] == 2) ? 'selected' : ''; ?>
								>
									Bottom
								</option>

							</select>

						</div>



                        <!-- Order -->
                        <div class="mb-3 col-md-4">

                            <label for="order" class="form-label">
                                Order
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="order"
                                name="order"
                                value="<?php echo htmlspecialchars($rwcat['order']); ?>"
                                required
                            >

                        </div>


                        <!-- Short Description -->
                        <div class="mb-3 col-md-12">

                            <label for="sdesc" class="form-label">
                                Short Description
                            </label>

                            <textarea
                                class="tinyMCE"
                                name="sdesc"
                                id="sdesc"
                            ><?php echo $rwcat['sdesc']; ?></textarea>

                        </div>


                        <!-- Description -->
                        <div class="mb-3 col-md-12">

                            <label for="cdesc" class="form-label">
                                Description
                            </label>

                            <textarea
                                class="tinyMCE"
                                name="cdesc"
                                id="cdesc"
                            ><?php echo $rwcat['c_desc']; ?></textarea>

                        </div>


                        <!-- iFrame -->
                        <div class="mb-3 col-md-12">

                            <label for="iframe" class="form-label">
                                iFrame
                            </label>

                            <textarea
                                class="form-control"
                                rows="5"
                                name="iframe"
                                id="iframe"
                                placeholder="Paste iframe code here"
                            ><?php echo htmlspecialchars($rwcat['iframe'] ?? ''); ?></textarea>

                        </div>


                        <!-- Meta Title -->
                        <div class="mb-3 col-md-6">

                            <label for="mtitle" class="form-label">
                                Meta Title
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="mtitle"
                                name="meta-title"
                                value="<?php echo htmlspecialchars($rwcat['meta_title']); ?>"
                            >

                        </div>


                        <!-- Meta Keywords -->
                        <div class="mb-3 col-md-6">

                            <label for="mkeywords" class="form-label">
                                Meta Keywords
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="mkeywords"
                                name="meta-keywords"
                                value="<?php echo htmlspecialchars($rwcat['meta_keywords']); ?>"
                            >

                        </div>


                        <!-- Meta Description -->
                        <div class="mb-3 col-md-12">

                            <label for="mdesc" class="form-label">
                                Meta Description
                            </label>

                            <textarea
                                class="form-control"
                                rows="3"
                                name="meta-desc"
                                id="mdesc"
                            ><?php echo $rwcat['meta_desc']; ?></textarea>

                        </div>


                        <!-- Image -->
                        <div class="mb-3 col-md-12">

                            <label for="formFile" class="form-label">
                                Image
                            </label>

                            <div class="imgquestion other">

                                <?php
                                $active = empty($rwcat['featured_img']) ? "" : "active";
                                ?>

                                <a
                                    href="javascript:"
                                    class="imgclose ri-close-circle-line <?=$active;?>"
                                ></a>

                                <input
                                    hidden
                                    class="form-control imgInput"
                                    name="img"
                                    type="file"
                                >

                                <?php if (empty($rwcat['featured_img'])) { ?>

                                    <img
                                        src="images/preview.jpg"
                                        alt="preview"
                                        class="preview"
                                    >

                                <?php } else { ?>

                                    <img
                                        src="<?=$path . $rwcat['featured_img'];?>"
                                        alt="<?=$rwcat['c_name'];?>"
                                        class="preview"
                                    >

                                <?php } ?>

                            </div>

                        </div>


                        <!-- Submit -->
                        <div class="col-md-12">

                            <input
                                type="submit"
                                value="Edit Record"
                                name="editRecord"
                                class="submitInput"
                            >

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
