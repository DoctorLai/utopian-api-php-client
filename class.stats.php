<?php

require_once('class.utopian.php');

class Stats extends Utopian {
  
  // internal data holder
  private $stats = null;
  
  // constructor
  public function Stats() {
    $this->Reload();
  }
  
  // reload the data
  public function Reload() {
    $this->stats = parent::GetStats();    
  }
  
  // return raw unprocessed data
  public function GetRawData() {
    return $this->stats; 
  }
  
  // get a list of all categories
  public function GetCategories() {
    $data = array();
    foreach ($this->stats->categories as $key => $m) {
      $data[] = $key;
    }
    return $data;
  }
  
  // get a list of all categories
  public function GetCategory($cat) {
    $cat = strtolower($cat);
    foreach ($this->stats->categories as $key => $m) {
      if (strtolower($key) == $cat) {
        return $m;
      }
    }
    return null;
  }    
  
  // get attributes
  public function GetValue($key) {
    switch ($key) {
      case "_id": return $this->stats->_id;
      case "total_paid_rewards": return $this->stats->total_paid_rewards;
      case "total_pending_rewards": return $this->stats->total_pending_rewards;
      case "total_paid_authors": return $this->stats->total_paid_authors;
      case "total_paid_curators": return $this->stats->total_paid_curators;
      case "__v": return $this->stats->__v;
      case "stats_moderator_shares_last_check": return $this->stats->stats_moderator_shares_last_check;
      case "stats_sponsors_shares_last_check": return $this->stats->stats_sponsors_shares_last_check;
      case "stats_total_pending_last_check": return $this->stats->stats_total_pending_last_check;
      case "stats_total_paid_last_check": return $this->stats->stats_total_paid_last_check;
      case "stats_paid_moderators_last_check": return $this->stats->stats_paid_moderators_last_check;
      case "stats_paid_sponsors_last_check": return $this->stats->stats_paid_sponsors_last_check;
      case "stats_categories_last_check": return $this->stats->stats_categories_last_check;
      case "stats_last_updated_posts": return $this->stats->stats_last_updated_posts;
      case "bot_is_voting": return $this->stats->bot_is_voting;
      case "last_limit_comment_benefactor": return $this->stats->last_limit_comment_benefactor;
      case "stats_total_pending_last_post_date": return $this->stats->stats_total_pending_last_post_date;
      case "stats_total_paid_last_post_date": return $this->stats->stats_total_paid_last_post_date;      
      case "stats_total_moderated": return $this->stats->stats_total_moderated;
    }
    return null;
  }  
  
  // get attributes
  public function GetCategoryValue($cat, $key) {
    $v = $this->GetCategory($cat);
    if ($v == null) {
      return null;
    }
    switch ($key) {
      case "average_tags_per_post": return $v->average_tags_per_post;
      case "total_tags": return $v->total_tags;
      case "average_links_per_post": return $v->average_links_per_post;
      case "total_links": return $v->total_links;
      case "average_images_per_post": return $v->average_images_per_post;
      case "total_images": return $v->total_images;
      case "average_posts_length": return $v->average_posts_length;
      case "total_posts_length": return $v->total_posts_length;
      case "average_paid_curators": return $v->average_paid_curators;
      case "total_paid_curators": return $v->total_paid_curators;
      case "average_paid_authors": return $v->average_paid_authors;
      case "total_paid_authors": return $v->total_paid_authors;
      case "total_paid": return $v->total_paid;
      case "average_likes_per_post": return $v->average_likes_per_post;
      case "total_likes": return $v->total_likes;
      case "total_posts": return $v->total_posts;
    }
    return null;
  }    
  
  // get attributes array
  public function GetCategoryValueArray($key) {
    $data = array();
    foreach ($this->stats->categories as $cat => $v) {
      switch ($key) {
        case "average_tags_per_post": $data[$cat] = $v->average_tags_per_post; break;
        case "total_tags": $data[$cat] = $v->total_tags; break;
        case "average_links_per_post": $data[$cat] = $v->average_links_per_post; break;
        case "total_links": $data[$cat] = $v->total_links; break;
        case "average_images_per_post": $data[$cat] = $v->average_images_per_post; break;
        case "total_images": $data[$cat] = $v->total_images; break;
        case "average_posts_length": $data[$cat] = $v->average_posts_length; break;
        case "total_posts_length": $data[$cat] = $v->total_posts_length; break;
        case "average_paid_curators": $data[$cat] = $v->average_paid_curators; break;
        case "total_paid_curators": $data[$cat] = $v->total_paid_curators; break;
        case "average_paid_authors": $data[$cat] = $v->average_paid_authors; break;
        case "total_paid_authors": $data[$cat] = $v->total_paid_authors; break;
        case "total_paid": $data[$cat] = $v->total_paid; break;
        case "average_likes_per_post": $data[$cat] = $v->average_likes_per_post; break;
        case "total_likes": $data[$cat] = $v->total_likes; break;
        case "total_posts": $data[$cat] = $v->total_posts; break;
      }
    }
    return $data;
  }    
}
