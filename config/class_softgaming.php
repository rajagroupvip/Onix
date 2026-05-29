<?php

class Whitelabel
{
    private $agent = "FBRm5Hn7ff"; // isi agent
    private $signature = "57d2f94d0ac77a74c665a91fdb0e1698"; // isi signature
    private $BASE_API = "https://api.smlss.online/v2/";
    
    public function CreateMember($username)
    {
        if(empty($username)) {
            return "Username tidak boleh kosong";
        } else {
            $action = $this->BASE_API . "CreateMember.aspx?agent_code=" . $this->agent . "&username=" . $username . "&signature=" . $this->signature;
            return $this->connect($action);
        }
    }
    
    public function getBalance($username)
    {
        if(empty($username)) {
            return "Username tidak boleh kosong";
        } else {
            $url = $this->BASE_API . "GetBalance.aspx?agent_code=" . $this->agent . "&username=" . $username . "&signature=" . $this->signature;
            return $this->connect($url);
        }
    }
    
    public function getBalanceAgent()
    {
        $url = $this->BASE_API . "AgentInfo.ashx?agent_code=" . $this->agent . "&signature=" . $this->signature;
        return $this->connect($url);
    }
    
    public function transaksi($username, $type, $amount)
    {
        if(empty($username) || empty($type) || empty($amount)) {
            return "Username, type, dan amount tidak boleh kosong";
        } else {
            $url = $this->BASE_API . "MakeTransaction.ashx?agent_code=" . $this->agent . "&username=" . $username . "&type=" . $type . "&amount=" . $amount . "&signature=" . $this->signature;
            return $this->connect($url);
        }
    }

    public function opengame($username, $gameid)
    {
        if(empty($username) || empty($gameid)) {
            return "Username dan gameid tidak boleh kosong";
        } else {
            $url = $this->BASE_API . "OpenGame.aspx?agent_code=" . $this->agent . "&username=" . $username . "&gameid=" . $gameid . "&signature=" . $this->signature;
            return $this->connect($url);
        }
    } 
    
    private function connect($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_AUTOREFERER, true); 
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.47 Safari/537.36');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output, true);
    }
}

$WL = new Whitelabel(); // New Integrasi by bikent
?>