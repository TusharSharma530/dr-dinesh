<?php

require_once 'database/db.php';

$title = 'Create Testimonial';

if (!isset($_SESSION['username'])) {
    echo "<script>window.location.href='{$path}manager'</script>";
    exit();
}

if (isset($_POST['addRecord'])) {

    $title = trim(mysqli_real_escape_string($con, $_POST['title'] ?? ""));
    $subtitle = trim(mysqli_real_escape_string($con, $_POST['subtitle'] ?? ""));
    $url = seo_friendly_url($title);
    $desc = trim(mysqli_real_escape_string($con, $_POST['idesc'] ?? ""));
    $order = trim(mysqli_real_escape_string($con, $_POST['order'] ?? ""));

    $uploadpath = "";

    if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) {
        $uploadpath = createImgWebp("img", "testimonials");
    }

    $sqlins = mysqli_query($con, "
        INSERT INTO testimonials (
            id,
            title,
            subtitle,
            url,
            `desc`,
            file,
            `order`
        ) VALUES (
            NULL,
            '$title',
            '$subtitle',
            '$url',
            '$desc',
            '$uploadpath',
            '$order'
        )
    ");

    if ($sqlins) {

        echo "
        <script>
            swal(
                'Added Successfully',
                'Click `OK` to Close',
                'success'
            );
            $('#submitForm').hide();
        </script>
        ";

        echo "
        <div class='col-md-12 padd0 text-center'>
            <a href='createtestimonial.php' class='btn btn-primary'>
                Create New
            </a>
        </div>
        ";

    } else {

        echo "
        <script>
            swal(
                'Failed',
                'Click `OK` to try Again',
                'error'
            );
            $('#submitForm').show();
        </script>
        ";

        echo mysqli_error($con);
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
                        <h3>Create Testimonial</h3>
                    </div>

                    <div class="createbtn">
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
                        enctype="multipart/form-data"
                    >

                        <div class="row">

                            <!-- Title -->
                            <div class="mb-3 col-md-6">

                                <label for="title" class="form-label">
                                    Name
                                </label>

                                <input
                                    type="text"
                                    class="form-control"
                                    id="title"
                                    name="title"
                                    placeholder="Enter title"
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
                                    placeholder="Enter order"
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
                                ></textarea>

                            </div>


                            <!-- Featured Image -->
                            <div class="mb-3 col-md-12">

                                <label for="formFile" class="form-label">
                                    Featured Image
                                </label>

                                <div class="imgquestion other">

                                    <a
                                        href="javascript:"
                                        class="imgclose ri-close-circle-line <?=$active ?? '';?>"
                                    ></a>

                                    <input
                                        hidden
                                        class="form-control imgInput"
                                        name="img"
                                        type="file"
                                    >

                                    <img
                                        src="images/preview.jpg"
                                        alt="preview"
                                        class="preview"
                                    >

                                </div>

                            </div>


                            <!-- Submit -->
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

<?php include "include/footer.php"; ?>
