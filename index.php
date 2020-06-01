<?php
include_once 'config/init.php';
?>

<?php
// instantiate Job object
$job = new Job;
$template = new Template('templates/frontpage.php');

// check the category passed
$category = isset($_GET['category'])?$_GET['category']:null;
if($category){
    // if category is set with a variable
    $template->jobs = $job->getByCategory($category);

}else{
    // if there is no query by category
    $template->title = 'New Jobs';
    // pass Job object contents into template
    $template->jobs = $job->getAllJobs();
}

// assign categories
$template->categories = $job->getCategories();

echo $template;

