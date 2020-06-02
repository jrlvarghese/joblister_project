<?php
// include header file
include 'inc/header.php';
?>
<div class="jumbotron">
<h2 class="page-header">Create Job Listing</h2>
<form method="post" action="create.php">
    <div class="form-group">
        <label>Company</label>
        <input type="text" class="form-control" name="company">
    <div>
    <!-- Form for inputing data -->
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="categoryId">
        <option value="0">Select Category</option>
        <!-- load categories from database -->
        <?php foreach($categories as $category): ?>
            <option value="<?php echo $category->id; ?>">
            <?php echo $category->catName; ?></option>
        <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Job Title</label>
        <input type="text" class="form-control" name="jobTitle">
    </div>
    <div class="form-group">
        <label>Job Description</label>
        <textarea type="text" class="form-control" name="description"></textarea>
    </div>
    <div class="form-group">    
        <label>Salary</label>
        <input type="text" class="form-control" name="salary">
    </div>
    <div class="form-group">    
        <label>Location</label>
        <input type="text" class="form-control" name="location">
    </div>
    <div class="form-group">    
        <label>Contact User</label>
        <input type="text" class="form-control" name="contactUser">
    </div>
    <div class="form-group">    
        <label>Contact Email</label>
        <input type="text" class="form-control" name="contactEmail">
    </div>
    <input type="submit" class="btn btn-primary" value="Submit" name="submit"> 
</form>
</div>
<?php
// include header file
include 'inc/footer.php';
?>