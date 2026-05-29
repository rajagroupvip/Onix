<?php
class Devgame
{
    public $agent = ""; //isi agent kalian  
    public $signature = "";  
    public $BASE_API = "https://apigameindo.biz.id/api/endpoint.php";
    
    public function createuser($username)
    {
        $action = $this->BASE_API."?cmd=createuser&agent=".$this->agent."&username=$username";
        return $this->connect($action);
    }

    public function transaksi($username, $type, $amount)
    {
        $action = $this->BASE_API . "?cmd=transaksi&agent=" . $this->agent . "&username=" . $username . "&type=" . $type . "&amount=" . $amount;
        return $this->connect($action);
    }
    public function getBalance($username)
    {
        $action = $this->BASE_API . "?cmd=getbalance&agent=" . $this->agent . "&username=" . $username;
        return $this->connect($action);
    }
    public function getbalanceagent()
    {
        $action = $this->BASE_API . "?cmd=getbalanceagent&agent=" . $this->agent;
        return json_encode($this->connect($action)); 
    }    
    public function opengame($username, $provider, $gamecode)
    {
        $action = $this->BASE_API . "?cmd=opengame&agent=" . $this->agent . "&username=" . $username . "&provider=" . $provider . "&gamecode=" . $gamecode;
        return $action; 
    } 
    public function getgamelist($provider)
    {
        $action = $this->BASE_API . "?cmd=getgamelist&agent=" . $this->agent . "&provider=" . $provider;
        return $this->connect($action);
    }

    private function connect($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE); 
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.47 Safari/537.36');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $output = curl_exec($ch);
        if($output === false) {
            echo 'Curl error: ' . curl_error($ch);
        }
        curl_close($ch);
        return json_decode($output, true);
    }

}

$dg = new Devgame();