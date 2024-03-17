<?php
    class User{
        private $db;
        function __construct($conn)
        {
            $this->db = $conn;
        }
        public function insertUser($username, $lname, $fname, $email, $password){
            
            try{
                
                $sql = "INSERT INTO users(user_name, last_name, first_name, email, password) VALUES (:username, :lname, :fname, :email, :pw)";
            
                $stmt=$this->db->prepare($sql);
           
                $stmt->bindparam(':fname', $fname);
              
                $stmt->bindparam(':lname', $lname);
           
                $stmt->bindparam(':username', $username);
          
                $stmt->bindparam(':email', $email);
              
                $stmt->bindparam(':pw', $password);
                
                $stmt->execute();
            
                return true;
            }catch(PDOException $e){
                echo "9";
                echo $e->getMessage();
                return false;
            }
        }
        public function getUser($username, $password){
            try{
                
                $sql = "select * from users where user_name=:username AND password=:pw";
            
                $stmt=$this->db->prepare($sql);
           
                $stmt->bindparam(':username', $username);
              
                $stmt->bindparam(':pw', $password);
                
                $stmt->execute();
    
                $result = $stmt->fetch();
                
                return $result;
            }catch(PDOException $e){
               
                echo $e->getMessage();
                return false;
            }
        }
    }
?>