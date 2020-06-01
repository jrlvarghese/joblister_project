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
                            WHERE jobs.categoryId=$category
                            ORDER BY postDate DESC");
        $results  = $this->db->resultSet();
        return $results;
    }
}