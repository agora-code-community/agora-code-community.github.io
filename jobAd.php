<?php
  // check if all fields have been set
  if (isset($_POST['jobTitle']) && isset($_POST['jobType']) && isset($_POST['company']) && isset($_POST['date']) &&
  isset($_POST['location']) && isset($_POST['appEmail']) && isset($_POST['description']) &&isset($_POST['qualifications'])) {
    // form input variables
    $jobtitle = $_POST['jobTitle'];
    $jobtype = $_POST['jobType'];
    $company = $_POST['company'];
    $appDead = $_POST['appDead'];
    $location = $_POST['location'];
    $appEmail = $_POST['appEmail'];
    $description = $_POST['description'];
    $qualifications = $_POST['qualifications'];

    // checking if fields have been filled or not
    if(!empty($jobtitle) && !empty($jobtype) && !empty($company) && !empty($appDead) &&
    !empty($location) && !empty($appEmail) && !empty($description) && !empty($qualifications)){
      # process the form and insert into db
      // insert query
      $SQL = "INSERT into jobs (jobtitle, jobtype, company, deadline, location, app_email, description, qualifications)
        values ('$jobtitle', '$jobtype', '$company', '$appDead', '$location', '$appEmail', '$description', '$qualifications')";
      // running the insert command
      mysqli_query($dbconn, $SQL) or die(mysqli_error($dbconn));

      echo '<div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <strong>Well done!</strong> Your job Ad has been posted successfully.
            Go here to <a style="color: blue;" href="index.php?page=jobs">Jobs page</a>.
          </div>';
    }else {
      # if fields are empty, shows error alert
?>
      <div class="alert alert-danger col-md-10 col-md-offset-1">
        <button type="button" class="close" data-dismiss="alert">x</button>
        <strong>All fields are required...</strong>
      </div>
<?php
    }

    # code...
  }

?>
<!-- internal css -->
<link rel="stylesheet" href="css/jobportal.css">

<!-- some fancy banner to beautify the page -->
<div class="banner2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 style="text-align: center">Create job Ad</h2>
            </div>
        </div>
    </div><!-- /.container -->
</div><!-- /.banner -->

<div class="container">
    <section class="section">
        <div class="col-md-10">
            <form role="form" action="" method="">
                <div class="form-group col-md-5">
                    <div class="input-field">
                        <input type="text" class="form-control" placeholder="Company name" name="company">
                    </div>
                </div>
                <div class="form-group col-md-5">
                    <div class="input-field">
                        <input type="text" class="form-control" placeholder="Job title" name="jobTitle">
                    </div>
                </div>
                <div class="form-group col-md-5">
                    <div class="input-field">
                        <input type="date" class="form-control" placeholder="Deadline Date" name="deadline">
                    </div>
                </div>
                <div class="form-group col-md-5">
                    <div class="input-field">
                        <input type="email" class="form-control" placeholder="Application Email" name="email">
                    </div>
                </div>
                <div class="form-group col-md-10">
                    <div class="input-field">
                        <input type="text" class="form-control" placeholder="Application url" name="url">
                    </div>
                </div>
                <div class="form-group col-md-10">
                    <div class="input-field">
                        <textarea class="form-control" placeholder="Job description" rows="3" name="description"></textarea>
                    </div>
                </div>
                <div class="form-group col-md-10">
                    <div class="input-field">
                        <textarea class="form-control" placeholder="Qualifications" rows="3" name="qualifications"></textarea>
                    </div>
                </div>
                <div class="form-group col-md-5 col-md-offset-4">
                    <button type="reset" class="btn btn-lg btn-default">Clear</button>
                    <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                </div>

            </form>
        </div>

    </section>
</div>



