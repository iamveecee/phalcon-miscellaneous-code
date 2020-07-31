<?php 
 
 try {
    // Get the database connection
    $PDOConnection = $this->di->getShared('db');
    // Create a save point
    $PDOConnection->begin();
    // Multiple insert query
    $phql = "INSERT INTO TABLE_NAME (A, B, C) VALUES (1, 2, 3), (4, 5, 6)";
    //  Prepar the qery
    $statement = $PDOConnection->prepare($phql);
    // Execute the statement
    $result = $statement->execute();
    // commit the transaction
    $PDOConnection->commit();
    
} catch (\PDOException  $ex) {
  
  $PDOConnection->rollback();         
  return $ex->getMessage();
           
}
