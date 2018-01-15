<?php
use PHPUnit\Framework\TestCase;

require('../class.moderators.php');

class UtopianTests_basic_tests extends TestCase {
  public function test_getlist_not_null() {
     $mods = new Moderators();
     $this->assertTrue($mods->GetList() != null);
  }  
  
  public function test_count() {
     $mods = new Moderators();
     $this->assertEqual($mods->GetGetTotal(), count($mods->GetList));
  }
  
  public function test_total_paid_rewards() {
     $mods = new Moderators();
     $this->assertTrue($mods->GetTottalPaidRewards() > 0);
  }  
}
