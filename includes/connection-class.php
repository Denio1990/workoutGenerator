<?php
	
class PDOConnection extends PDO{
		
    protected $connectionCredentials;

    protected $user;
    protected $pass;
    protected $name;
    protected $host;

    protected $dsn;
    
    protected $connected = false;

    protected $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];
    
    public function __construct(){

        $this->connectionCredentials = parse_ini_file("config.ini");

        $this->user = $this->connectionCredentials['user'];
        $this->pass = $this->connectionCredentials['pass'];
        $this->name = $this->connectionCredentials['name'];
        $this->host = $this->connectionCredentials['host'];


        $this->dsn = 'mysql:host='.$this->host.';dbname='.$this->name.';';
    }
	
	public function getConnection(){
        //check if connected
        if($this->connected == false){
            //try and make a new connection
            try {
                
                $dbh = new PDO($this->dsn, $this->user, $this->pass,$this->options);
                $this->connected = true;
                return $dbh;
            } catch (PDOException $e) {
                echo 'PDO Connection failed: ' . $e->getMessage();
            }
        }
        else{
            //connected do nothing
        }
	}
		
		
}

?>
