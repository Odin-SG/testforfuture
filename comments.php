<?php
class Comments {
	private $db;
	private $result;
	
	function __construct(){
		$this->db = new PDO("mysql:host=localhost;dbname=guestbook", "myacc");
	}

	function getComments(){
        $this->result = $this->db->query("SELECT * FROM notes;");
        $resArray = array();
        foreach ($this->result as $row){
            array_push($resArray, $row);
        }
        return $resArray;
    }

    function writeComment($name, $time, $date, $mes){
        $this->result = $this->db->query("INSERT INTO `notes` (`name`, `time`, `date`, `message`) VALUES ('$name', '$time', '$date', '$mes')");
	}
	
	function __destruct(){
        $result = null;
        $db = null;
	}
}
?>
