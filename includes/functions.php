<?php
class Users {
	public $tableName = 'account';
	
	function __construct(){
		//Database configuration
		$dbServer = 'your-db-server'; //Define database server host
		$dbUsername = 'your-db-username'; //Define database username
		$dbPassword = 'your-db-password'; //Define database password
		$dbName = 'your-db-name'; //Define database name
		
		//Connect databse
		$con = mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
		if(mysqli_connect_errno()){
			die("Failed to connect with MySQL: ".mysqli_connect_error());
		}else{
			$this->connect = $con;
		}
	}
	
	function checkUser($oauth_provider,$oauth_uid,$fname,$lname,$email,$locale,$oauth_token,$oauth_secret,$profile_image_url){
		$prevQuery = mysqli_query($this->connect,"SELECT * FROM $this->tableName WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
		if(mysqli_num_rows($prevQuery) > 0){
			$update = mysqli_query($this->connect,"UPDATE $this->tableName SET oauth_token = '".$oauth_token."', oauth_secret = '".$oauth_secret."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
		}else{
			$insert = mysqli_query($this->connect,"INSERT INTO $this->tableName SET oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', first_name = '".$fname."', last_name = '".$lname."', email = '".$email."', oauth_token = '".$oauth_token."', oauth_secret = '".$oauth_secret."', avatar = '".$profile_image_url."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."'") or die(mysqli_error($this->connect));
		}
		
		$query = mysqli_query($this->connect,"SELECT * FROM $this->tableName WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
		$result = mysqli_fetch_array($query);
		return $result;
	}
}
?>
