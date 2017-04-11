<?php
// getting id from url
if (!isset($_GET['id']) && empty($_GET['id'])){
    header("Location: $http_referrer");
}else{
    $id = $_GET['id'];
}
// retrieving specific records
$query = "SELECT * FROM jobs WHERE id='$id'";
// run query
$results = mysqli_query($dbconn, $query) or die(mysqli_error($dbconn));

while ($row = mysqli_fetch_assoc($results)){
    $company = $row['company'];
    $jobTitle = $row['jobtitle'];
    $jobtype = $row['jobtype'];
    $deadline = $row['deadline'];
    $description = $row['description'];
    $qualification = $row['qualifications'];
    $appEmail = $row['app_email'];
}
?>
<!-- Internal css -->
<link rel="stylesheet" href="css/jobportal.css" xmlns="http://www.w3.org/1999/html">

<!-- some fancy banner to beautify the page -->
<div class="banner2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 style="text-align: center"><?php echo $company;?><br><small>Job Advert</small></h2>
            </div>
        </div>
    </div><!-- /.container -->
</div><!-- /.banner -->

<div class="container">
    <div class="search-container">
        <div class="row" style="background: #dddddd">
            <div class="col-md-10 col-md-offset-2" id="side-search">

                <form role="form" action="" method="post">
                    <div class="form-group col-md-3">
                        <input type="text" id="kword" class="form-control rounded" name="keyword" placeholder="Keyword">
                    </div>

                    <div class="form-group col-md-3">
                        <input type="text" class="form-control rounded" name="location" placeholder="Location">
                    </div>

                    <div class="form-group col-md-3">
                        <input type="text" class="form-control rounded" name="category" placeholder="Category">
                    </div>
                    <!-- submit button -->
                    <div class="form-group col-md-3">
                        <button type="submit" class="btn btn-md btn-success">Filter</button>
                    </div>
                    <!-- inline checkboxes -->
                    <div class="form-group col-md-8 col-md-offset-1" style="font-size: 16px">
                        <label class="checkbox-inline">
                            <input type="checkbox" id="fulltime" value="fulltime"> Full-time
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="parttime" value="parttime"> Part-time
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="internship" value="internship"> Internship
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="freelance" value="freelance"> Freelance
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox" id="contract" value="contract"> Contract
                        </label>
                    </div>
                </form>
            </div>
        </div><!-- end search row -->
        <!-- divider -->
        <hr>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="text-right">
                    <a href="?page=jobs" class="btn btn-success">
                        <i class="fa fa-arrow-left"></i>Go Back
                    </a>
                </div>
                <div class="heading wow fadeInUp">
                    <h2><?php echo $company;?> <br><small>Job details</small></h2>
                    <h4><strong>Job title:</strong> <?php echo $jobTitle;?></h4>
                </div>

                <div class="block sub-heading">
                    <h3>Description</h3>
                    <p><?php echo $description;?></p>
                </div>
                <div class="block sub-heading">
                    <h3>Qualifications/Requirements</h3>
                    <p><?php echo $qualification;?> </p>
                </div>
                <div class="text-right">
                    <a href="mailto:<?php echo $appEmail;?>"
                       class="btn btn-success">Apply for this job</a>
                    <p class="help-block">Or email: <?php echo $appEmail; ?></p>
                </div>
            </div>
        </div> <!-- end row -->
        <!-- this row is to display related jobs -->

    </div>

</div><!-- /.container -->
