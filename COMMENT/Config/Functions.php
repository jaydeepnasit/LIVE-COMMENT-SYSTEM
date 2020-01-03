<?php

class Functions{

    private $DBHOST = 'localhost';
    private $DBUSER = 'root';
    private $DBPASS = '';
    private $DBNAME = 'comment';
    public $conn;

    public function __construct(){
        try{
            $this->conn = mysqli_connect($this->DBHOST, $this->DBUSER, $this->DBPASS, $this->DBNAME);
            if(!$this->conn){  
                throw new Exception('Connection was Not Extablish');
            }
        }
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
            
        }

    }

    public function validate($string){
        $string_vali = mysqli_real_escape_string($this->conn, trim(strip_tags($string)));
        $string_vali = urldecode($string_vali);
        return $string_vali;
    }

    public function insert($tb_name, $tb_field){
       
        $q_data = "";

        foreach($tb_field as $q_key => $q_value){
            $q_data = $q_data."$q_key='$q_value',";
        }
        $q_data = rtrim($q_data,",");

        $query = "INSERT INTO $tb_name SET $q_data";
        $insert_fire = mysqli_query($this->conn, $query);
        if($insert_fire){
            return $insert_fire;
        }
        else{
            return false;
        }

    }

    public function user_verify($tb_name, $condition, $op="AND"){

		$field_data = "";
		foreach($condition as $d_key => $d_value){
			$field_data .= "$d_key='$d_value' $op ";
        }
        
        $field_data = rtrim($field_data,"$op ");
        
		$select = "SELECT * FROM $tb_name WHERE $field_data";
		$select_fire = mysqli_query($this->conn, $select);
		if(mysqli_num_rows($select_fire) == 1){
			return true;
		}
		else{
			return false;
		}

    }

    public function replay_fetch($select_data, $tbl_name1, $tbl_name2, $t1_f, $t2_f, $condition){

        $select = "SELECT $select_data FROM $tbl_name1 INNER JOIN $tbl_name2 ON $tbl_name1.$t1_f = $tbl_name2.$t2_f WHERE $tbl_name2.$t2_f = $condition";
        $query = mysqli_query($this->conn, $select);
        if(mysqli_num_rows($query) > 0){
            $select_fetch = mysqli_fetch_all($query, MYSQLI_ASSOC);
            if($select_fetch){
                return $select_fetch;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
        
    }

    public function select_order($tbl_name, $field_id, $order='ASC'){

        $select = "SELECT * FROM $tbl_name ORDER BY $field_id $order";
        $query = mysqli_query($this->conn, $select);
        if(mysqli_num_rows($query) > 0){
            $select_fetch = mysqli_fetch_all($query, MYSQLI_ASSOC);
            if($select_fetch){
                return $select_fetch;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }

    }

    public function select_order_where($tbl_name, $condition, $field_id, $op='AND', $order='ASC'){

        $field_op = "";
		foreach ($condition as $q_key => $q_value) {
			$field_op = $field_op."$q_key='$q_value' $op ";
		}
		$field_op = rtrim($field_op,"$op ");

        $select = "SELECT * FROM $tbl_name WHERE $field_op ORDER BY $field_id $order";
        $query = mysqli_query($this->conn, $select);
        if(mysqli_num_rows($query) > 0){
            $select_fetch = mysqli_fetch_all($query, MYSQLI_ASSOC);
            if($select_fetch){
                return $select_fetch;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }

    }

	public function select_assoc($tbl_name, $condition, $op='AND'){

		$field_op = "";
		foreach ($condition as $q_key => $q_value) {
			$field_op = $field_op."$q_key='$q_value' $op ";
		}
		$field_op = rtrim($field_op,"$op ");

        $select_assoc = "SELECT * FROM $tbl_name WHERE $field_op";

		$select_assoc_query = mysqli_query($this->conn, $select_assoc);
		if(mysqli_num_rows($select_assoc_query) == 1){	

			$select_assoc_fire = mysqli_fetch_assoc($select_assoc_query);
			if($select_assoc_fire){
				return $select_assoc_fire;
			}
			else{
				return false;
            }
            
		}
		else{	
			return false;
		}

    }   
    
    public function select_count($tbl_name, $condition, $op='AND'){

		$field_op = "";
		foreach ($condition as $q_key => $q_value) {
			$field_op = $field_op."$q_key='$q_value' $op ";
		}
		$field_op = rtrim($field_op,"$op ");
        $select_count = "SELECT COUNT(*) AS NumberComments FROM $tbl_name WHERE $field_op";
        $select_count_query = mysqli_query($this->conn, $select_count);
		if($select_count_query){	
            $row_cnt = mysqli_fetch_array($select_count_query, MYSQLI_ASSOC);
            return $row_cnt; 
		}
		else{	
			return false;
		}

	}       

}




?>