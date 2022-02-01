<?php
include('header.php');
?>



<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Add Brand</h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <form action="includes/brand.inc.php" role="form" method="POST" class="tm-edit-product-form">
                            <div class="form-group mb-3">
                                <label for="name">Brand Name
                                </label>
                                <input id="name" name="brand_name" type="text" class="form-control validate" required />
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Brand Description</label>
                                <textarea name="brand_description" ; class="form-control validate" rows="3" required></textarea>
                            </div>


                    </div>

                </div>


                <div class="col-12">
                    <button type="submit" name="submit" class="btn btn-primary btn-block text-uppercase">Add Brand Now</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('scripts.php');
include('footer.php');
?>
<script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
<!-- https://jqueryui.com/download/ -->
<script>
    $(function() {
        $("#expire_date").datepicker();
    });
</script>