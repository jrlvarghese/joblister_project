<?php
include_once 'config/init.php';
?>

<?php
// instantiate Job object
$job = new Job;
// check whether the id for job is set
$job_id = isset($_GET['id'])?$_GET['id']:null;

// check whether the form is submitted or not
if(isset($_POST['submit'])){
    $data = array();
    $data['categoryId'] = $_POST['categoryId'];
    $data['company'] = $_POST['company'];
    $data['jobTitle'] = $_POST['jobTitle'];
    $data['description'] = $_POST['description'];
    $data['salary'] = $_POST['salary'];
    $data['location'] = $_POST['location'];
    $data['contactUser'] = $_POST['contactUser'];
    $data['contactEmail'] = $_POST['contactEmail'];
    // insert data and check if that was successful or not
    // give proper redirect message too
    if($job->updateJob($job_id,$data)){
        redirect('index.php','Your job has been updated', 'success');
    }else{
        redirect('index.php', 'Something went wrong', 'error');
    }
}

$template = new Template('templates/edit-job.php');
// load values in job field
$template->job = $job->getJobDetails($job_id);
// load categories from database
$template->categories = $job->getCategories();

echo $template;

