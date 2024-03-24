<?php
    class User{
        private $db;
        function __construct($conn)
        {
            $this->db = $conn;
        }
        public function insertUser($username, $lname, $fname, $email, $password, $isAdmin){
            
            try{
                
                $sql = "INSERT INTO users(user_name, last_name, first_name, email, password, is_admin) VALUES (:username, :lname, :fname, :email, :pw, :isAdmin)";
            
                $stmt=$this->db->prepare($sql);
           
                $stmt->bindparam(':fname', $fname);
              
                $stmt->bindparam(':lname', $lname);
           
                $stmt->bindparam(':username', $username);
          
                $stmt->bindparam(':email', $email);
              
                $stmt->bindparam(':pw', $password);

                $stmt->bindparam(':isAdmin', $isAdmin);
                
                $stmt->execute();
            
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
        public function updateUser($username, $lname, $fname, $email, $password, $isAdmin, $userID){
            
            try{
                
                $sql = "UPDATE `users` 
                SET `user_name`=:username,`last_name`=:lname,`first_name`=:fname,
                `email`=:email,`is_admin`=:isAdmin,`password`=:pw
                WHERE user_id = :userID";
            
                $stmt=$this->db->prepare($sql);
           
                $stmt->bindparam(':fname', $fname);
              
                $stmt->bindparam(':lname', $lname);
           
                $stmt->bindparam(':username', $username);
          
                $stmt->bindparam(':email', $email);
              
                $stmt->bindparam(':pw', $password);

                $stmt->bindparam(':isAdmin', $isAdmin);

                $stmt->bindparam(':userID', $userID);
                
                $stmt->execute();
            
                return true;
            }catch(PDOException $e){
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
        public function getUserInfo($userID){
            try{
                
                $sql = "select * from users where user_id = :userID";
            
                $stmt=$this->db->prepare($sql);
           
                $stmt->bindparam(':userID', $userID);
                
                $stmt->execute();
    
                $result = $stmt->fetch();
                
                return $result;
            }catch(PDOException $e){
               
                echo $e->getMessage();
                return false;
            }
        }
        public function getUsers($userID){
            try{
                
                $sql = "select * from users where user_id!=:userID";
               
                $result=$this->db->prepare($sql);
           
                $result->bindparam(':userID', $userID);
                
                $result->execute();

                return $result;
            }catch(PDOException $e){
               
                echo $e->getMessage();
                return false;
            }
        }
        public function deleteUser($userID){
            try{
                
                $sql = "DELETE FROM `users` WHERE user_id = :userID";
            
                $stmt=$this->db->prepare($sql);
           
                $stmt->bindparam(':userID', $userID);
                
                $stmt->execute();
    
            }catch(PDOException $e){
               
                echo $e->getMessage();
                return false;
            }
        }
    }
    
?>