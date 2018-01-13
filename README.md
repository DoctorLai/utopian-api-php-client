# utopian-api-php-client
PHP Client implementation of public Utopian API.

# Installation and Usage
You just need to `git clone` the project and reference the unit

```
require('class.utopian.php');
```

## Creating Instance
```
$utopian = new Utopian();
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
