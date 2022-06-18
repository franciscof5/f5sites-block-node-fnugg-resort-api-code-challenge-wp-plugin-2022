=== Fnugg Resort ===
Contributors:      Francisco Matelli
Tags:              block
Tested up to:      6.0
Stable tag:        0.1.0
License:           GPL-2.0-or-later
License URI:       https://www.gnu.org/licenses/gpl-2.0.html

Get information from our resorts

== Description ==

This is the long description. No limit, and you can use Markdown (as well as in the following sections).

For backwards compatibility, if this section is missing, the full length of the short description will be used, and
Markdown parsed.

== Installation ==

This section describes how to install the plugin and get it working.

e.g.

1. Upload the plugin files to the `/wp-content/plugins/f5sites-block-node-fnugg-resort-api-code-challenge-wp-plugin-2022` directory, or install the plugin through the WordPress plugins screen directly.
1. Activate the plugin through the 'Plugins' screen in WordPress


== Frequently Asked Questions ==

= A question that someone might have =

An answer to that question.

= What about foo bar? =

Answer to foo bar dilemma.

== Screenshots ==

1. This screen shot description corresponds to screenshot-1.(png|jpg|jpeg|gif). Note that the screenshot is taken from
the /assets directory or the directory that contains the stable readme.txt (tags or trunk). Screenshots in the /assets
directory take precedence. For example, `/assets/screenshot-1.png` would win over `/tags/4.3/screenshot-1.png`
(or jpg, jpeg, gif).
2. This is the second screen shot

== Changelog ==

= 0.1.0 =
* Release

== Arbitrary section ==

You may provide arbitrary sections, in the same format as the ones above. This may be of use for extremely complicated
plugins where more information needs to be conveyed that doesn't fit into the categories of "description" or
"installation." Arbitrary sections will be shown below the built-in sections outlined above.

1. Gutenberg
Create a WordPress plugin that enables a user in the administration panel to insert a
block in a post / page to present data from a ski resort using the Fnugg API
(https://api.fnugg.no/).
Your plugin should be displayed as a Gutenberg block the post/ page editor where
you allow the user to search for a resort with autocomplete (example queries below):
https://api.fnugg.no/suggest/autocomplete/?q=fonna
To be able to fetch the resort details requires another service call:
https://api.fnugg.no/search?q=fonna
Note that which fields you would like the service to return can be specified using a
sourceFields parameter, example:
https://api.fnugg.no/search?q=Hafjell%20Alpinsenter&sourceFields=name,descriptio
n,lifts.count,lifts.open
2. API middleware
Create a PHP class that handles all REST API calls that you use as a middleware
between WordPress and the Fnugg API for retrieving data and processing the data
you need in order to populate the Gutenberg block.

● Tip: Use the built in WP functions to call external endpoints eg:
wp_remote_get:
(https://developer.wordpress.org/reference/functions/wp_remote_get/)
● Bonus: Filter the data from the REST response and return only the required
fields
● Add a cache handler in your REST API class
Based on the response from the API for the selected resort insert a block in the post
content that presents the data fields displayed in the screenshot below for the
selected resort, it is not a requirement that the output looks like the attached
screenshot: