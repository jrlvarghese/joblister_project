<?php
include_once 'config/init.php';
?>

<?php
// instantiate class Job - refer to Job.php
$job = new Job;

$template = new Template('templates/frontpage.php');
// using method getAllJobs from Job class
$template->jobs = $job->getAllJobs();

echo $template;
