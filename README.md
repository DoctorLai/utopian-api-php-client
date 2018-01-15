# utopian-api-php-client
PHP Client implementation of public Utopian API. The basic class is `Utopian` which `Moderators` and `Sponsors` extend. 

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

## Creating Instances
```
$utopian = new Utopian();
$moderators = new Moderators();
$sponsors = new Sponsors();
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
