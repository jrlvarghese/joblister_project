<?php
include_once 'config/init.php';
?>

<?php
// instantiate Job object
$job = new Job;
$template = new Template('templates/job-single.php');
// get the id of job
$job_id = isset($_GET['id'])?$_GET['id']:null;
// update the template with job
$template->job = $job->getJobDetails($job_id);

// for deleting a job
// check the id of the job to be deleted
if(isset($_POST['del_id'])){
    $del_id = $_POST['del_id'];
    if($job->deleteJob($del_id)){
        // redirect page after deleting successufuly
        redirect("index.php","Successfuly deleted listing", "success");
    }else{
        redirect("index.php", "Failed to delete listing", "error");
    }
}
echo $template;

