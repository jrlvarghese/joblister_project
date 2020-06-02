<?php
// steps:
// instantiate a Database object -- refer to Database.php
class Job{
    private $db;
    //instantiate Database
    public function __construct(){
        $this->db = new Database;
    }
    // method to get all jobs listed in db
    public function getAllJobs(){
        $this->db->query("SELECT jobs.*, jobcategory.catName AS cname 
                            FROM jobs
                            INNER JOIN jobcategory 
                            ON jobs.categoryId=jobcategory.id 
                            ORDER BY postDate DESC");

        // assign results
        $results = $this->db->resultSet();
        return $results;
    }

    // method to get cateogories
    public function getCategories(){
        // query all categories from table 'jobcategory'
        $this->db->query("SELECT * FROM jobcategory");
        $results = $this->db->resultSet();
        return $results;
    }

    // method to get jobs by category
    public function getByCategory($category){
        $this->db->query("SELECT jobs.*, jobcategory.catName AS cname
                            FROM jobs
                            INNER JOIN jobcategory
                            ON jobs.categoryId=jobcategory.id
                            WHERE jobs.categoryId=:category
                            ORDER BY postDate DESC");
        $this->db->bind(':category', $category);
        $results  = $this->db->resultSet();
        return $results;
    }

    // method to get category name
    public function getCategoryName($category_id){
        $this->db->query("SELECT catName FROM jobcategory WHERE id=:category_id");
        $this->db->bind(':category_id', $category_id);
        $row = $this->db->resultSingle();
        return $row;
    }

    // another method to run the same function 'getCategoryName
    public function getCatName($catId){
        $this->db->query("SELECT catName FROM jobcategory WHERE id=$catId");
        $result = $this->db->resultSingle();
        return $result;
    }

    // function to get job details
    public function getJobDetails($job_id){
        $this->db->query("SELECT * FROM jobs WHERE id=:job_id");
        $this->db->bind(':job_id', $job_id);
        $result = $this->db->resultSingle();
        return $result;
    }

    // method to insert data
    public function insertJob($d){
        // insert query
        $this->db->query("INSERT INTO jobs 
                    (categoryId,company,jobTitle,description,salary,location,contactUser,contactEmail) 
                    VALUES(:categoryId,:company,:jobTitle,:description,:salary,:location,:contactUser,:contactEmail)");
        // bind data
        $this->db->bind(':categoryId',$d['categoryId']);
        $this->db->bind(':company',$d['company']);
        $this->db->bind(':jobTitle',$d['jobTitle']);
        $this->db->bind(':description',$d['description']);
        $this->db->bind(':salary',$d['salary']);
        $this->db->bind(':location',$d['location']);
        $this->db->bind(':contactUser',$d['contactUser']);
        $this->db->bind(':contactEmail',$d['contactEmail']);
        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // method to delete listing
    public function deleteJob($id){
        $this->db->query("DELETE FROM jobs WHERE id=$id");
        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    // method to update job
    public function updateJob($id, $d){
        $this->db->query("UPDATE jobs SET
                        categoryId = :categoryId,
                        company = :company,
                        jobTitle = :jobTitle,
                        description = :description,
                        salary = :salary,
                        location = :location,
                        contactUser = :contactUser,
                        contactEmail = :contactEmail
                        WHERE id=$id");

        // bind data
        $this->db->bind(':categoryId',$d['categoryId']);
        $this->db->bind(':company',$d['company']);
        $this->db->bind(':jobTitle',$d['jobTitle']);
        $this->db->bind(':description',$d['description']);
        $this->db->bind(':salary',$d['salary']);
        $this->db->bind(':location',$d['location']);
        $this->db->bind(':contactUser',$d['contactUser']);
        $this->db->bind(':contactEmail',$d['contactEmail']);
        // execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}