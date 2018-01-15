<?php

require('class.utopian.php');

class Moderators extends Utopian {
  
  // internal data holder
  private $moderators = null;
  
  // constructor
  public function Moderators() {
    $this->Reload();
  }
  
  // reload the data
  public function Reload() {
    $this->moderators = parent::GetModerators();
  }
  
  // return raw unprocessed data
  public function GetRawData() {
    return $this->moderators; 
  }
  
  // get a list of all moderators
  public function GetList() {
    $data = array();
    foreach ($this->moderators->results as $m) {
      $data[] = $m->account;
    }
    return $data;
  }
  
  // get total number of moderators
  public function GetTotal() {
    return $this->moderators->total;
  }
  
  // get the specific moderator
  public function GetModerator($acc) {
    foreach ($this->moderators->results as $m) {
      if ($m->account == $acc) {
        return $m;
      }
    }
    return null;   
  }
  
  // get total paid rewards
  public function GetTotalPaidRewards() {
    $all = 0;
    foreach ($this->moderators->results as $m) {
      $all += $m->total_paid_rewards;
    }
    return $all;  
  }
  
  // get total should_receive_rewards
  public function GetShouldReceiveRewards() {
    $all = 0;
    foreach ($this->moderators->results as $m) {
      $all += $m->should_receive_rewards;
    }
    return $all;  
  }  
  
  // get total_moderated sum count
  public function GetTotalModerated() {
    $all = 0;
    foreach ($this->moderators->results as $m) {
      $all += $m->total_moderated;
    }
    return $all;  
  } 
  
  // get total sum of paid reward steem
  public function GetTotalPaidRewardsSteem() {
    $all = 0;
    foreach ($this->moderators->results as $m) {
      $all += $m->total_paid_rewards_steem;
    }
    return $all;  
  }   
  
  // get a list of super moderators
  public function GetListOfSuperModerators() {
    $data = array();
    foreach ($this->moderators->results as $m) {
      if ($m->supermoderator) {
        $data[] = $m->account;
      }      
    }
    return $data;
  }

  // get a list of all apprentices
  public function GetListOfApprentice() {
    $data = array();
    foreach ($this->moderators->results as $m) {
      if ($m->apprentice) {
        $data[] = $m->account;
      }      
    }
    return $data;
  }       
  
  // get a list of banned moderators
  public function GetListOfBannedModerators() {
    $data = array();
    foreach ($this->moderators->results as $m) {
      if ($m->banned) {
        $data[] = $m->account;
      }      
    }
    return $data;
  }    
  
  // get a list of currently active moderators
  public function GetListOfActiveModerators() {
    $data = array();
    foreach ($this->moderators->results as $m) {
      if ($m->reviewed) {
        $data[] = $m->account;
      }      
    }
    return $data;
  }     
}
