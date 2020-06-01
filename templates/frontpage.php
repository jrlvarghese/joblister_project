<?php
// include header file
include 'inc/header.php';
?>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Find Jobs</h1>
        <form method="GET" action="index.php">
            <select name="category" class="form-control">
                <option value="0">Select Category</option>
                <?php foreach($categories as $category): ?>
                <option value="<?php echo $category->id; ?>">
                    <?php echo $category->catName; ?>
                </option>
                <?php endforeach; ?>
            </select>
            <br>
            <input type="submit" class="btn btn-lg btn-success" value="FIND" style="float: right;">
        </form>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <h3><?php echo $title; ?></h3>
    <?php foreach($jobs as $job): ?>
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-10">
            <h2><?php echo $job->jobTitle; ?></h2>
            <p><?php echo $job->description; ?></p>
            <p><a class="btn btn-secondary" href="job.php?id=<?php echo $job->id; ?>" role="button">View details &raquo;</a></p>
        </div>
        <!-- <div class="col-md-2">
            <a class="btn btn-default" href="#">View more</a>
        </div> -->
    </div> <!-- /row -->
    <?php endforeach; ?>
    

</div> <!-- /container -->

</main>

<?php
// include footer file
include 'inc/footer.php';
?>