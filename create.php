<?php
include_once 'config/init.php';
?>

<?php
// instantiate Job object
$job = new Job;
$template = new Template('templates/create-job.php');
// load categories from database
$template->categories = $job->getCategories();

// check whether the form is submitted or not
if($_POST['submit']){
    $data = array();
    $data['company'] = $_POST['company'];
    $data['jobTitle'] = $_POST['jobTitle'];
    $data['categoryId'] = $_POST['category'];
    $data['description'] = $_POST['description'];
    $data['salary'] = $_POST['salary'];
    $data['location'] = $_POST['location'];
    $data['contactUser'] = $_POST['contactUser'];
    $data['contactEmail'] = $_POST['contactEmail'];
    // insert data and check if that was successful or not
    // give proper redirect message too
    if($job->insertData($data)){
        redirect('index.php','Your job has been listed.', 'success');
    }else{
        redirect('create.php', 'Something went wrong.', 'error');
    }
}

echo $template;

