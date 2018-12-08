<?php
require_once("../includes/connection-class.php");
require_once("exercise-class.php");


$exerciseObject = new Exercises();
$getExerciseList = $exerciseObject->getExercises();

$random_exercies = array_rand($getExerciseList,3);
var_dump($random_exercies);

$html = "<ul>";

foreach($getExerciseList as $exercise){
    $html .= "<li> Exercise Name : ". $exercise['exercise_name']. " Reps : ". $exercise['exercise_reps']."</li>";

}
$html .="</ul>";
echo $html;


?>