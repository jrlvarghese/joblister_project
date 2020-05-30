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
}