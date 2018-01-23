<?php

require_once('class.utopian.php');

class Posts extends Utopian {

  // internal data holder
  private $posts = null;

  // constructor
  public function Posts() {
    $this->Reload();
  }

  // reload the data
  public function Reload() {
    $this->posts = parent::GetPosts();
  }

  // return raw unprocessed data
  public function GetRawData() {
    return $this->posts;
  }

  // get a list of all posts
  public function GetList() {
    $data = array();
    foreach ($this->posts->results as $m) {
      $data[] = $m->title;
    }
    return $data;
  }

  // get total number of posts
  public function GetTotal() {
    return $this->posts->total;
  }

  // get total paid rewards
  public function GetTotalPaidRewards() {
    $all = 0;
    foreach ($this->posts->results as $m) {
      if (property_exists($m,'total_paid_rewards')) {
        $all += $m->total_paid_rewards;
      }
    }
    return $all;
  }

  // get total should_receive_rewards
  public function GetShouldReceiveRewards() {
    $all = 0;
    foreach ($this->posts->results as $m) {
      $all += $m->should_receive_rewards;
    }
    return $all;
  }

  // get total vesting shares
  public function GetTotalVesting() {
    $all = 0;
    foreach ($this->posts->results as $m) {
      $all += $m->vesting_shares;
    }
    return $all;
  }

  // get total sum of paid reward steem
  public function GetTotalPaidRewardsSteem() {
    $all = 0;
    foreach ($this->posts->results as $m) {
      $all += $m->total_paid_rewards_steem;
    }
    return $all;
  }

  // get a list of all posts that opt out payout
  public function GetListOfOptedOutPosts() {
    $data = array();
    foreach ($this->posts->results as $m) {
      if ($m->opted_out) {
        $data[] = $m->account;
      }
    }
    return $data;
  }
}
