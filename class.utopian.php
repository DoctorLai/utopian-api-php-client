<?php
// Author: @justyy
// License: MIT

class Utopian {
    /*
        define base API access end point
    */
    private $API_BASE_URL = "https://api.utopian.io/api/";
    
    /*
        error string
    */
    private $error = "";
    
    /*
        get current error
    */
    public function GetError() {
      return $this->error;
    } 
    
    /*
        reset status
    */
    public function Reset() {
      $this->error = '';
    }
    
    /*
       constructor
    */
    public function Utopian() {
    
    }
        
    /*
        call API and set status
    */
    public function CallAPI($api, $method, $data = null, $headers = null) {
      $url = $this->API_BASE_URL . $api . '/';
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      if ($headers) {
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
      }
      switch ($method) {
        case "GET":
            curl_setopt($curl, CURLOPT_URL, $url . "?" . $data);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
            break;
        case "POST":
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            break;
        case "DELETE":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE"); 
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            break;
      }
      $response = curl_exec($curl);
      $data = json_decode($response);
    
      /* Check for 404 (file not found). */
      $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
      // Check the HTTP Status code
      switch ($httpCode) {
        case 200:
            $this->error = "200: OK";
            break;
        case 404:
            $this->error = "404: API Not found";
            break;
        case 500:
            $this->error = "500: Servers replied with an error.";
            break;
        case 502:
            $this->error = "502: Servers may be down or being upgraded. Hopefully they'll be OK soon!";
            break;
        case 503:
            $this->error = "503: Service unavailable. Hopefully they'll be OK soon!";
            break;
        default:
            $this->error = "Undocumented error: " . $httpCode . " : " . curl_error($curl);
            break;
      }
      curl_close($curl);
      return ($data);  
    }    
  
    /*
      Get a list of moderators
    */
    public function GetModerators() {
      return $this->CallAPI("moderators", "GET");    
    }  
    
    /*
      Get a list of sponsors
    */
    public function GetSponsors() {
      return $this->CallAPI("sponsors", "GET");    
    }   
    
    /*
      Check if given account is moderator
    */
    public function IsModerator($account) {
      $moderators = $this->GetModerators();
      if ($moderators == null || $moderators->results == null) {
        throw "Error: API failure at IsModerator";
      }
      $account = strtolower($account);      
      foreach ($moderators->results as $acc) {
        if (strtolower($acc->account) == $account) {
          return true;
        }
      }       
      return false;
    }   
   
    /*
      Check if given account is sponser
    */
    public function IsSponsor($account) {
      $sponsors = $this->GetSponsors();
      if ($sponsors == null || $sponsors->results == null) {
        throw "Error: API failure at IsSponsor";
      }
      $account = strtolower($account);      
      foreach ($sponsors->results as $acc) {
        if (strtolower($acc->account) == $account) {
          return true;
        }
      }       
      return false;
    }     
    
    /*
      Get posts
    */
    public function GetPosts($param = null) {
      return $this->CallAPI("posts", "GET", $param);     
    } 
    
    /*
      Get a Post
    */
    public function GetPost($account, $permlink) {
      return $this->CallAPI("posts/$account/$permlink", "GET");
    }
    
    /*
      Get stats
    */
    public function GetStats() {
      return $this->CallAPI("stats", "GET")->stats;
    }
    
    /*
      Check is bot voting
    */
    public function IsBotVoting() {
      $stats = $this->GetStats();
      return $stats->bot_is_voting;
    }
    
    /*
      Count
    */
    public function GetCount($param = null) {
      if (!$param) {
        $param = array("limit" => 1);
      } else {
        $param['limit'] = 1;
      }
      return $this->GetPosts($param)->total;
    }
}
