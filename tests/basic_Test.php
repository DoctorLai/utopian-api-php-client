<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../class.utopian.php';

use PHPUnit\Framework\TestCase;

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

