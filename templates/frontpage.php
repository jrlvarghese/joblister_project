<?php
// include header file
include 'inc/header.php';
?>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Hello, world!</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
    </div>
</div>

<div class="container">
    <!-- Example row of columns -->
    <?php foreach($jobs as $job): ?>
    <div class="row">
        <div class="col-md-10">
            <h2><?php echo $job->jobTitle; ?></h2>
            <p><?php echo $job->description; ?></p>
            <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
        </div>
        <!-- <div class="col-md-2">
            <a class="btn btn-default" href="#">View more</a>
        </div> -->
    </div> <!-- /row -->
    <hr>
    <?php endforeach; ?>
    

</div> <!-- /container -->

</main>

<?php
// include footer file
include 'inc/footer.php';
?>