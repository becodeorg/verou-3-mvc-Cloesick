<?php

// This class will manage the connection to the database
// It will be passed on the other classes who need it
class DatabaseManager
{
    // These are private: only this class needs them
    private string $host;
    private string $user;
    private string $password;
    private string $dbname;
    // This one is public, so we can use it outside of this class
    // We could also use a private variable and a getter (but let's not make things too complicated at this point)
    public  PDO $connection;
    //use info from beneath to create a connection lower
    //take info from line 17
    //LINK CLASS VARIABLES 
    public function __construct(string $host, string $user, string $password, string $dbname)
    {
        // TODO: Set any user and password information
        $this->host=$host;
        $this->user=$user;
        $this->password=$password;
        $this->dbname=$dbname;
        //$this "host" stands for the variable within the class "host(18)"
        //$this refers to block ABOVE the constructor
        //second host is $host from constructor
        //line 17 "$host" = config host
    
        //Now DEFAULT info is set
        //$this refers to all on the BASE level
        //Next CREATE connection
    }
        //create a PDO connection - phpAdmin Database to PHP - 
        //MySQLi -other sources of databases -- USE PDO TO GET DB's together
        //PDO is already PREDEFINED in php
    public function connect(): void
    {   //THIRD: SETTING THE PDO PHP SQL
        $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->user, $this->password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        //showing errors + also show data output "format" ->PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC
        echo'database connected';

        // TODO: make the connection to the database
        // here create the connection with info from higher
        // PDO wants a string, username(string), password(string)
        // W3 schools Example(PDO)
            //3 parameters
            //1 where to make connection from -> Database = dbserver name = dbsn =sn 
            //2 username
            //3 password
            //again take host from within variable
            //set attribute in connection
                //
    }
}