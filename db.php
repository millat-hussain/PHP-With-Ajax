<?php

class Database{
// Database Connection FORM PDO 
    private $dsn="mysql:host=localhost;dbname=mpi";
    private $pass="";
    private $user="root";
    public $conn;

    function __construct()
    {
        try{
            $this->conn=new PDO($this->dsn,$this->user,$this->pass);
        }catch(PDOException $e){
            echo "Database NOT connection"+$e->getMessage();
        }
    }

// Database Connection FORM PDO 

// Insert Data 
        public  function insert($notice){
            $sql="INSERT INTO notice (notice)VALUES(:notice)";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['notice'=>$notice]);

            return true;
        }
// Insert Data 

// Read form Database 
       public function read(){
            $data =array();
            $sql="SELECT * FROM notice ORDER BY id DESC";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $rasult=$stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($rasult as $row){
                $data[] = $row;
            }
            return $data;
        }

// Read form Database 

// GetUser By Id 

       public function getuserById($id){

            $sql="SELECT * FROM notice WHERE id=:id";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute(['id'=>$id]);
            $rasult=$stmt->fetch(PDO::FETCH_ASSOC);
            return $rasult;

        }

// GetUser By Id 

// Update user 



    public function update($id , $name ){
        $sql="UPDATE notice set notice=:not where id =:id ";
        $stmt=$this->conn->prepare($sql);
        $stmt->execute(['id'=>$id,'not'=>$name]);
        return true ;
    }


    

    
// Update user 

// Delete User From Database 
 public function delete($id)
{
    $sql="DELETE FROM user_tbl WHERE id=:id";
    $stmt=$this->conn->prepare($sql);
    $stmt->execute(['id'=>$id]);
    return true;
    
}
// Delete User From Database 

// Total Row Counter 

        public function totalRowCount()
        {
            $sql="SELECT * FROM user_tbl";
            $stmt=$this->conn->prepare($sql);
            $stmt->execute();
            $t_rows = $stmt->rowCount();
            return $t_rows;
        
        }

        // Total Row Counter 

}






?>