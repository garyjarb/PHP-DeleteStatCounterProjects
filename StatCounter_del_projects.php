<?php
/*PHP Script to delete StatCounter Projects in a batch using StatCounter API */

function delete_statcounter_project($project_id) {    /** Modify **/

            $username = "YOUR_StatCounter_USER_NAME";
            $password = "YOUR_STATCOUNTER_PASSWORD";
            $admin_password = "YOUR_STATCOUNTER_ADMIN_PASSWORD";
            
            $timezone = "America/New_York";    /** Do not modify past here **/    
            $time_of_execution = time();    
            $base = "http://api.statcounter.com/remove_project"; 
              
$urldata = '?vn=3' . '&pi=' . $project_id . '&u=' . $username . '&up=' . $admin_password . '&t=' . $time_of_execution . '&f=xml'; 
$shadata = '?vn=3' . '&pi=' . $project_id . '&u=' . $username . '&up=' . $admin_password . '&t=' . $time_of_execution . '&f=xml' . $password;  
         
       $authdata = sha1($shadata);  
       $url = $base . $urldata . '&sha1=' . $authdata;
       
       //echo $authdata;
       echo $url;
       echo "<br />";
       echo $xml = simplexml_load_file($url);
       
       
  }
  
/***********************Call Function delete_statcounter_project()*********************/
$info = array_map('str_getcsv', file('statcounter.csv'));
$y=1;
foreach ($info as $domains) {  
    
    $site=$domains[0];
    $projectid=$domains[1];   
    //sleep for 3 seconds
    echo $y . '-';
    echo $site . '-';
    echo $projectid;
    echo delete_statcounter_project($projectid);
                echo '<br>';
    $y=++$y;            
    sleep(1); 
       
    }
/*****************End function call*************************/
 ?>
