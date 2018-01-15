<?php
use PHPUnit\Framework\TestCase;

require('../class.sponsors.php');

class UtopianTests_sponsors_tests extends TestCase {

  public function test_getlist_not_null() {
     $sponsors = new Sponsors();
     $this->assertTrue($sponsors->GetList() != null);
  }  
  
  public function test_count() {
     $sponsors = new Sponsors();
     $this->assertEqual($sponsors->GetTotal(), count($sponsors->GetList()));
  }
  
  public function test_total_paid_rewards() {
     $sponsors = new Sponsors();
     $this->assertTrue($sponsors->GetTotalPaidRewards() > 0);
  }  
}
