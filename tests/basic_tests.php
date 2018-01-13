<?php
use PHPUnit\Framework\TestCase;

require('../class.utopian.php');

class UtopianTests_basic_tests extends TestCase {

  public function test_IsModerator() {
     $utopian = new Utopian();
     $this->assertTrue($utopian->IsModerator("justyy"));
  }  
  
  public function test_IsSponsor() {
     $utopian = new Utopian();
     $this->assertFalse($utopian->IsSponsor("justyy"));
  }
}

