<?php
namespace connection;
  class Cat { 
    private $servername = "localhost";
	private  $username = "root";
	private $password = "";
	public function __construct($foo)
    {
			$conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			// echo "Connected successfully"; 
			}
			catch(PDOException $e)
			{
			// echo "Connection failed: " . $e->getMessage();
			}
    }
    static function says() {echo 'meoow';}  
	
	}