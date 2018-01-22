# utopian-api-php-client
PHP Client implementation of public Utopian API. The basic class is `Utopian` which `Moderators`, `Stats` and `Sponsors` extend. 

# Installation and Usage
You just need to `git clone` the project and reference the unit.

```
require('class.utopian.php');
```

If you just need `Moderators` you can do this instead:

```
require('class.moderators.php');
```

If you just need `Sponsors` you can do this instead:

```
require('class.sponsors.php');
```

If you just need `Stats` you can do this instead:

```
require('class.stats.php');
```

## Creating Instances
```
$utopian = new Utopian();
$moderators = new Moderators();
$sponsors = new Sponsors();
$stats = new Stats();
```

## Getting a list of moderators
```
$moderators = $utopian->GetModerators()
```

## Check if account is moderator type
```
if ($utopian->IsModerator('justyy')) echo "Hello, yes!";
```

## Check if account is sponsor type
```
if ($utopian->IsSponsor('justyy')) echo "Hello, i am sponsor!";
```

## Get List of Sponsors
```
print_r($utopian->GetSponsors());
```

## Get Approved posts
```
foreach ($utopian->GetPosts() as $post) {
   // do something about $post;
}
```

## Get Flagged posts
```
$flagged_posts = $utopian->GetPosts(array("status" => "flagged"));
```

## Get count of approved contribution
```
echo "Total approved: " . $utopian->GetCount();
```

## Get post detail
```
var_dump($utopian->GetPost('justyy', 'string-contains-test-cannot-be-added-to-the-post'));
```

## Check if bot is voting
```
if ($utopian->IsBotVoting()) {
 // ok write a post
}
```

## Reload the Data (Moderators)
This will re-fetch the data from Utopian API.
```
$moderators->Reload();
```

## Raw Data (Moderators)
```
$moderators->GetRawData();
```

## Get a list of Moderators
```
print_r($moderators->GetList());
```

## Get Total Number of Moderators
```
echo "there are " . $moderators->GetTotal() . " moderators.";
```

## Find a Moderator
```
$justyy = $moderators->GetModerator('justyy');
print_r($justyy);
```

## Get Total Paid Rewards
```
echo "Total Paid Rewards: " . $moderators->GetTotalPaidRewards();
```

## Get Total of should_receive_rewards
```
echo "Should Receive Total: " . $moderators->GetShouldReceiveRewards();
```

## Get Total Moderated Count
```
echo "Total Moderated Count: " . $moderators->GetTotalModerated();
```

## Get Total Sum of total_paid_rewards_steem
```
echo "Steem: " . $moderators->GetTotalPaidRewardsSteem();
```

## Get a list of Super Moderators
```
foreach ($moderators->GetListOfSuperModerators() as $acc) {
   echo "Boss: " . $acc;
}
```

## Get a list of Apprentices
```
foreach ($moderators->GetListOfApprentice() as $acc) {
   echo "Student: " . $acc;
}
```

## Get a list of Banned Moderators
```
foreach ($moderators->GetListOfBannedModerators() as $acc) {
   echo "Banned: " . $acc;
}
```

## Get a list of Active Moderators
```
foreach ($moderators->GetListOfActiveModerators() as $acc) {
   echo "Active: " . $acc;
}
```

## Reload the Data (Sponsors)
This will re-fetch the data from Utopian API.
```
$sponsors->Reload();
```

## Raw Data (Sponsors)
```
$sponsors->GetRawData();
```

## Get a list of Sponsors
```
print_r($sponsors->GetList());
```

## Get Total Number of sponsors
```
echo "there are " . $sponsors->GetTotal() . " sponsors.";
```

## Find a Sponsor
```
$ned = $sponsors->GetSponsor('ned');
print_r($ned);
```

## Get Total Paid Rewards
```
echo "Total Paid Rewards: " . $sponsors->GetTotalPaidRewards();
```

## Get Total of should_receive_rewards
```
echo "Should Receive Total: " . $sponsors->GetShouldReceiveRewards();
```

## Get Total Sum of total_paid_rewards_steem
```
echo "Steem: " . $sponsors->GetTotalPaidRewardsSteem();
```

## Get Total Vesting by all sponsors
```
echo "Total Vesting by all sponsors: " . $sponsors->GetTotalVesting();
```

## Get a list of Witnesses
```
foreach ($sponsors->GetListOfWitness() as $acc) {
   echo "Witness: " . $acc;
}
```

## Get Total of paid-rewards-steem
```
echo "Total Paid Rewards Steem: " . $sponsors->GetTotalPaidRewardsSteem();
```

## Get a list of Opted-out sponsors
```
foreach ($sponsors->GetListOfOptedOutSponsors() as $acc) {
   echo "Opted_out: " . $acc;
}
```

## Reload the Data (Stats)
This will re-fetch the data from Utopian API.
```
$stats->Reload();
```

## Raw Data (Stats)
```
$stats->GetRawData();
```

## Get a list of all cateogries
```
print_r($stats->GetCategories());
```

## Get data for a cateogry
```
$blog = $stats->GetCategory('blog');
if ($blog) {
   echo $blog->total_images;
}
```

## Get attribute
Possible values: 
\_id, total_paid_rewards, total_pending_rewards, total_paid_authors, total_paid_curators, \__v, stats_moderator_shares_last_check, stats_sponsors_shares_last_check, stats_total_pending_last_check, stats_total_paid_last_check, stats_paid_moderators_last_check, stats_paid_sponsors_last_check, stats_categories_last_check, stats_last_updated_posts, bot_is_voting, last_limit_comment_benefactor, stats_total_pending_last_post_date, stats_total_paid_last_post_date, stats_total_moderated

```
echo $stats->GetValue('bot_is_voting');
```

## Get category attribute
Possible key attributes (second parameter): average_tags_per_post, total_tags, average_links_per_post, total_links, average_images_per_post, total_images, average_posts_length, total_posts_length, average_paid_curators, total_paid_curators, average_paid_authors, total_paid_authors, total_paid, average_likes_per_post, total_likes, total_posts

```
echo $stats->GetCategoryValue('blog', 'total_tags');
```

## Get category attribute array
This method will return array (key-value pairs) for given attribute. For example, the following sums up all `total_links` in all categories.

```
$x = array_values($stats->GetCategoryValueArray("total_links"));
echo array_sum($x);
```
