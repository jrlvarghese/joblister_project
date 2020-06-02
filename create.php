<?php
include_once 'config/init.php';
?>

<?php
// instantiate Job object
$job = new Job;
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
    if($job->insertJob($data)){
        redirect('index.php','Your job has been listed', 'success');
    }else{
        redirect('index.php', 'Something went wrong', 'error');
    }
}

$template = new Template('templates/create-job.php');
// load categories from database
$template->categories = $job->getCategories();

echo $template;

