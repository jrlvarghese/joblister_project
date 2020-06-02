<?php
// include header file
include 'inc/header.php';
?>
<div class="jumbotron">
<h2 class="page-header">Edit Job Listing</h2>
<form method="post" action="edit.php?id=<?php echo $job->id; ?>">
    <div class="form-group">
        <label>Company</label>
        <input type="text" class="form-control" name="company" value="<?php echo $job->company; ?>">
    <div>
    <!-- Form for inputing data -->
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="categoryId">
        <option value="0">Select Category</option>
        <!-- load categories from database -->
        <?php foreach($categories as $category): ?>
            <?php if($category->id == $job->categoryId): ?>
                <option value="<?php echo $category->id; ?>" selected><?php echo $category->catName; ?></option>
            <?php else: ?>
                <option value="<?php echo $category->id; ?>"><?php echo $category->catName; ?></option>
            <?php endif; ?>
        <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Job Title</label>
        <input type="text" class="form-control" name="jobTitle" value="<?php echo $job->jobTitle; ?>">
    </div>
    <div class="form-group">
        <label>Job Description</label>
        <textarea type="text" class="form-control" name="description" ><?php echo $job->description; ?></textarea>
    </div>
    <div class="form-group">    
        <label>Salary</label>
        <input type="text" class="form-control" name="salary" value="<?php echo $job->salary; ?>">
    </div>
    <div class="form-group">    
        <label>Location</label>
        <input type="text" class="form-control" name="location" value="<?php echo $job->location; ?>">
    </div>
    <div class="form-group">    
        <label>Contact User</label>
        <input type="text" class="form-control" name="contactUser" value="<?php echo $job->contactUser; ?>">
    </div>
    <div class="form-group">    
        <label>Contact Email</label>
        <input type="text" class="form-control" name="contactEmail" value="<?php echo $job->contactEmail; ?>">
    </div>
    <input type="submit" class="btn btn-primary" value="Submit" name="submit"> 
</form>
</div>
<?php
// include header file
include 'inc/footer.php';
?>