<?php
require_once("../includes/connection-class.php");

class Exercises {
    
    protected $connection;

    function __construct(){}

    // generate random numbers 
    private function generateRandomNumbers(){


    }
    
    //retrieve a set of excersises to be used for the workout
    public function getExercises(){

        //check if number of exercises is different from default
        
        try{
    
            $dbh = new PDOConnection();
            $connection = $dbh->getConnection();
        
            // build SQL prepared statement
            $stmt = $connection->prepare("SELECT * FROM WG_exercises");
            if($stmt->execute()){
                return $stmt->fetchAll();
                
            }
            else{
                echo "Query Failed!";
            }
        }
        catch(PDOException $e){
            return 'Caught exception: '.  $e->getMessage(). "\n";
        }

    }

}
?>