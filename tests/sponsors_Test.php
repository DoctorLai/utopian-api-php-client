<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../class.sponsors.php';

use PHPUnit\Framework\TestCase;

class UtopianTests_sponsors_tests extends TestCase {

  public function test_getlist_not_null() {
     $sponsors = new Sponsors();
     $this->assertTrue($sponsors->GetList() != null);
  }  
  
  public function test_count() {
     $sponsors = new Sponsors();
     $this->assertEquals($sponsors->GetTotal(), count($sponsors->GetList()));
  }
  
  public function test_total_paid_rewards() {
     $sponsors = new Sponsors();
     $this->assertTrue($sponsors->GetTotalPaidRewards() > 0);
  }  
}
