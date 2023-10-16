=== Woo Admin Sample  ===
Contributors: (this should be a list of wordpress.org userid's)
Donate link: https://example.com/
Tags: WooCommerce
Requires at least: 6.0
Tested up to: 6.3.2
Stable tag: 6.0
Requires PHP: 8.1.9
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

=== Question brief ===

Hi ! You’re requested to implement functionality to fetch a list of elements from an API, filtering from the currently logged in user preferences for that integration (think of it as if you needed to fetch tweets from specific Twitter users).

The user will be able to enter an alphanumeric list of elements, which should be then passed on as an array to the API calls.

For the sake of examples, you can use https://httpbin.org/post as the URL to post data to, and use the headers returned there as the return data from the API.

The site is using the Storefront theme for WooCommerce.


== Plugin Requirements ==

    You should display the information fetched for each user in a widget, and also under a tab under WooCommerce My Account section.
    The functionality needs to impact as less as possible on the site performance (leveraging as many caching techniques as possible, along WP good practices).
    The settings section for each user should be available under My Account too (the same tab you’re required to display the data in). Provide a basic UI for managing the settings.
    The solution as a whole needs to be as secure as possible.

