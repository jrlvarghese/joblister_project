<?php
// include header file
include 'inc/header.php';
?>
<main role="main">
<div class="jumbotron">
    <h2 class="page-header"><?php echo $job->jobTitle.' ('.$job->location.')'; ?></h2>
    <small>Posted by: <?php echo $job->contactUser.' on '.$job->postDate; ?></small>
    <hr>
    <p class="lead"><?php echo $job->description; ?></p>
    <ul class="list-group">
        <li class="list-group-item">
            <strong>Company: <?php echo $job->company; ?></strong>
        </li>
        <li class="list-group-item">
            <strong>Salary: <?php echo $job->salary; ?></strong>
        </li>
        <li class="list-group-item">
            <strong>Contact Email: <?php echo $job->contactEmail; ?></strong>
        </li>
    </ul>
    <br><br>
    <a href="index.php">Go Back</a>
    <br><br>

    <div class="well">
        <a href="edit.php?id=<?php echo $job->id; ?>" class="btn btn-primary">Edit</a>
        <form style="display:inline;" method="post" action="job.php">
            <input type="hidden" name="del_id" value="<?php echo $job->id; ?>">
            <input type="submit" class="btn btn-danger" value="Delete">
        </form>
    </div>
</div>
</main>
<?php
// include header file
include 'inc/footer.php';
?>