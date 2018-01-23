<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../class.stats.php';

use PHPUnit\Framework\TestCase;

class UtopianTests_stats_tests extends TestCase {

  public function test_getcategories_not_null() {
     $stats = new Stats();
     $this->assertTrue($stats->GetCategories() != null);
  }  

  public function test_getcategory_blog_not_null() {
     $stats = new Stats();
     $categories = $stats->GetCategories();
     $this->assertTrue($stats->GetCategory($categories[0]) != null);
  }

  public function test_getvalue_total_paid_authors() {
     $stats = new Stats();
     $this->assertTrue($stats->GetValue('total_paid_authors') > 0);
  }  
}
