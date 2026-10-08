<?php

require_once 'database/db.php';

$title = 'Edit Testimonial';

if (!isset($_SESSION['username'])) {
    echo "<script>window.location.href='{$path}manager'</script>";
    exit();
}

$tcupid = $_GET['id'] ?? "";

$sqltc = mysqli_query($con, "SELECT * FROM testimonials WHERE id = {$tcupid}");

if (mysqli_num_rows($sqltc)) {
    $rwtc = mysqli_fetch_assoc($sqltc);
}

if (isset($_POST['editRecord'])) {

    $title = trim(mysqli_real_escape_string($con, $_POST['title'] ?? ""));
    $subtitle = trim(mysqli_real_escape_string($con, $_POST['subtitle'] ?? ""));
    $url = seo_friendly_url($title);
    $desc = trim(mysqli_real_escape_string($con, $_POST['idesc'] ?? ""));
    $order = trim(mysqli_real_escape_string($con, $_POST['order'] ?? ""));

    /*
     * Keep old image if no new image is uploaded
     */
    if (empty($_FILES['img']['name'])) {

        $uploadpath = $rwtc['file'];

    } else {

        $uploadpath = createImgWebp("img", "testimonials");

    }

    /*
     * Update testimonial
     */
    $sqlcheck = mysqli_query($con, "
        UPDATE testimonials SET
            `title` = '$title',
            `subtitle` = '$subtitle',
            `url` = '$url',
            `desc` = '$desc',
            `file` = '$uploadpath',
            `order` = '$order'
        WHERE id = $tcupid
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
                        <h3>Edit Testimonial</h3>
                    </div>

                    <div class="createbtn">
                        <a href="createtestimonial.php">Add New</a>
                        <a href="testimonials.php">List</a>
                    </div>

                </div>

            </div>


            <div class="col-md-12">

                <div class="page-content">

                    <div class="msgbox"></div>

                    <form
                        method="POST"
                        id="submitForm"
                        class="row"
                        enctype="multipart/form-data"
                    >

                        <!-- Name / Title -->
                        <div class="mb-3 col-md-6">

                            <label for="title" class="form-label">
                                Name
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="title"
                                name="title"
                                value="<?php echo htmlspecialchars($rwtc['title'] ?? ''); ?>"
                                required
                            >

                        </div>


                        <!-- Subtitle -->
                        <div class="mb-3 col-md-6">

                            <label for="subtitle" class="form-label">
                                Subtitle
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="subtitle"
                                name="subtitle"
                                value="<?php echo htmlspecialchars($rwtc['subtitle'] ?? ''); ?>"
                                placeholder="Enter subtitle"
                            >

                        </div>


                        <!-- Order -->
                        <div class="mb-3 col-md-3">

                            <label for="order" class="form-label">
                                Order
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="order"
                                name="order"
                                value="<?php echo htmlspecialchars($rwtc['order'] ?? ''); ?>"
                            >

                        </div>


                        <!-- Description -->
                        <div class="mb-3 col-md-12">

                            <label for="desc" class="form-label">
                                Description
                            </label>

                            <textarea
                                class="tinyMCE"
                                name="idesc"
                                id="desc"
                                required
                            ><?php echo $rwtc['desc'] ?? ''; ?></textarea>

                        </div>


                        <!-- Featured Image -->
                        <div class="mb-3 col-md-12">

                            <label for="formFile" class="form-label">
                                Featured Image
                            </label>

                            <div class="imgquestion other">

                                <?php
                                $active = empty($rwtc['file']) ? "" : "active";
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

                                <?php if (empty($rwtc['file'])) { ?>

                                    <img
                                        src="images/preview.jpg"
                                        alt="preview"
                                        class="preview"
                                    >

                                <?php } else { ?>

                                    <img
                                        src="<?=$path . $rwtc['file'];?>"
                                        alt="testimonial image"
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
