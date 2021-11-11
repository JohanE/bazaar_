<?php

class ImageCleaner extends sfPropelBaseTask
{
  protected function configure()
  {
    $this->namespace = 'maintenance';
    $this->name = 'imagecleaner';
    $this->briefDescription = 'Cleaning up old images';

    $this->detailedDescription = <<<EOF
The [mailtasks:sender|INFO] just sends mails natively :
 
  [php symfony mailtasks:sender] 
EOF;

  }
 
  protected function execute($arguments = array(), $options = array())
  {
    # set up db params
    $user = "johan";
    $passwd = "johan";
    $database_name="internetbazar";
    $fileRoot="/home/joe/bazaar/web/uploads/";
    // your code here
    $this->log('maintenance:imagecleaner');

    # see database.yml
    $conn = mysql_connect("localhost",$user, $passwd);
    if (!$conn){
      die('Could not connect: ' . mysql_error());
    }
    
    mysql_select_db($database_name, $conn);
    $result = mysql_query("SELECT id, path FROM temp_image_info WHERE is_deleted=0 limit 0,600");
    
    $successful_deletions = array();

    while($row = mysql_fetch_array($result))
      {
	echo $row['id'] ." ";
	echo $row['path'];
	echo "\n";    
	
	try {
	  exec('rm -f ' .$fileRoot . 'images/' . $row['path']);	  
	  exec('rm -f ' . $fileRoot . 'thumbnail/' . $row['path']);
	  if(!file_exists($fileRoot . 'images/'.$row['path']))
	    array_push($successful_deletions, $row['id']);
	  
	# set is_deleted to 0 if deletion was successful
	} catch (Exception $e) {
	  echo "could not delete ".$row['path'] . " , " .$e->getMessage();
	}	
      }
    echo "array: " . print_r($successful_deletions);
    $result = mysql_query("delete from temp_image_info");
  }

}
?>