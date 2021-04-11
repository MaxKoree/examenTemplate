<?php

class database
{

    private $host;
    private $database;
    private $username;
    private $password;
    private $charset;
    private $conn;

    function __construct(){

        $this->host = "localhost";
        $this->username = "root";
        $this->password = '';
        $this->database = "hengelsport";
        $this->charset = "utf8";

        $options = [ 
            PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $conn = "mysql:host=$this->host;dbname=$this->database;charset=$this->charset";

            $this->db = new PDO($conn, $this->username, $this->password, $options);
            
            // echo "Database connection successfully established";

        } catch (\PDOException $e) {
            throw new \PDOException("Unable to connect: " . $e->getMessage());
        }
    }

    public function login($uname, $psw){
        //deze functie checkt of de user bestaat (stap1)
        //vervolgengs checkt die of de ingevoerde username/password correct in combo zijn met de db

        //todo: vervang usertabel met je database tabel waar de gebruiker zit!
        // $sql = "select id, username, password, usertype FROM usertabel WHERE username:uname";

        $sql = "SELECT gebruikersnaam, wachtwoord FROM medewerker WHERE gebruikersnaam = :gebruikersnaam";

        $named_placeholder = [
            'gebruikersnaam'=>$uname
        ];

        // user komt uit de database
        // alleen values uit $user op te halen voor kolomnamen in je select (zie $sql)
        $user = $this->select($sql, $named_placeholder);

        if(is_array($user) && count($user) > 0){
            $hashed_password = $user[0]['wachtwoord'];
            $username = $user[0]['gebruikersnaam'];

            if($uname == $username && $psw == $hashed_password){
                session_start(); //$_session wordt hier aangemaakt, dit is een empty array, dus[]
                $_session['username'] = $username;
                $_session['logged_in'] = true;
                // usertype bijv. optional

                //pagina_waar_gebruiker_naartoe_moet.php
                header("location: welcome.php");
            }else{
                echo "username and/of password incorrect. Please fix your input values and try agian";
            }
        }
    }

        //deze functie haalt data uit op onze database
        public function select($statement, $named_placeholder){

            // PDOStatementObject (prepared statement)
            $stmt = $this->db->prepare($statement);

            $stmt->execute($named_placeholder);

            // fetch data alleen als het over select hebben!
            $result = $stmt->fetchall(PDO::FETCH_ASSOC);

            // ['id=>1, 'username'=>'nilu', 'password'=>'nilu] 
            return $result;
        } 

        public function insert($statement, $placeholder, $locatie){
            //hieronder voorbeeld van mogelijke statement/placeholder.
            // LET OP! deze woorden meegeven als argument wannneer deze functie aangeroepen wordt.
            // voorbeeld inser into statement.
            //insert INTO user VALUES id=NULL, username:username, password=:psw
            
            //voorbeeld placeholder die bij bovenstaande statement hoort:
            //['username'=>$username, 'psw'=>$password]

            // voorbeeld $locatie = medewerkers-overzicht.php (dit is de pagina waar je naar navigeert na de insert)

            try{
                // start transaction
                $this->db->beginTransaction();

                $stmt = $this->db->prepare($statement);

                // INSERT INTO user VALUES id=NULL, username=:uname, password=:pass
                $stmt-> execute($placeholder);

                // comit
                $this->db->commit();

                header("location: $locatie");

            } catch(Exception $e){
                $this->db->rollback();
                echo "error message" . $e->getMessage();
            }
        }

        public function edit_or_delete($statement, $placeholder, $location){
            $stmt = $this->db->prepare($statement);
            $stmt->execute($placeholder);
            header("location: $location");
        }
}  
        
?>