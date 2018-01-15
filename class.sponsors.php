<?php

require('class.utopian.php');

class Sponsors extends Utopian {
  
  // internal data holder
  private $sponsors = null;
  
  // constructor
  public function Sponsors() {
    $this->Reload();
  }
  
  // reload the data
  public function Reload() {
    $this->sponsors = parent::GetSponsors();
  }
  
  // return raw unprocessed data
  public function GetRawData() {
    return $this->sponsors; 
  }
  
  // get a list of all sponsors
  public function GetList() {
    $data = array();
    foreach ($this->sponsors->results as $m) {
      $data[] = $m->account;
    }
    return $data;
  }
  
  // get total number of sponsors
  public function GetTotal() {
    return $this->sponsors->total;
  }
  
  // get the specific sponsors
  public function GetSponsor($acc) {
    foreach ($this->sponsors->results as $m) {
      if ($m->account == $acc) {
        return $m;
      }
    }
    return null;   
  }
  
  // get total paid rewards
  public function GetTotalPaidRewards() {
    $all = 0;
    foreach ($this->sponsors->results as $m) {
      $all += $m->total_paid_rewards;
    }
    return $all;  
  }
  
  // get total should_receive_rewards
  public function GetShouldReceiveRewards() {
    $all = 0;
    foreach ($this->sponsors->results as $m) {
      $all += $m->should_receive_rewards;
    }
    return $all;  
  }  
  
  // get total vesting shares
  public function GetTotalVesting() {
    $all = 0;
    foreach ($this->sponsors->results as $m) {
      $all += $m->vesting_shares;
    }
    return $all;  
  } 
  
  // get total sum of paid reward steem
  public function GetTotalPaidRewardsSteem() {
    $all = 0;
    foreach ($this->sponsors->results as $m) {
      $all += $m->total_paid_rewards_steem;
    }
    return $all;  
  }   
  
  // get a list of witness
  public function GetListOfWitness() {
    $data = array();
    foreach ($this->sponsors->results as $m) {
      if ($m->is_witness) {
        $data[] = $m->account;
      }      
    }
    return $data;
  }

  // get a list of all sponsors that opt out payout
  public function GetListOfOptedOutSponsors() {
    $data = array();
    foreach ($this->sponsors->results as $m) {
      if ($m->opted_out) {
        $data[] = $m->account;
      }      
    }
    return $data;
  }       
}
