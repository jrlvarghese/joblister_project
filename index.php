<?php
include_once 'config/init.php';
?>

<?php
// instantiate Job object
$job = new Job;

$template = new Template('templates/frontpage.php');
$template->title = 'New Jobs';
// assign categories
$template->categories = $job->getCategories();
// pass Job object contents into template
$template->jobs = $job->getAllJobs();
echo $template;

