<?php
/* Last updated with phpLoopia 1.0
 *
 * This example file shows you how to call your registred domains at
 * your Loopia account. It parses through them and prints out a link
 * to each of them.
 *
 * Obviously, you'll want to replace the "<username>" and
 * "<password>" with one's provided by Loopia for use with the API.
 */


include_once("phpLoopia.php");
$l = new phpLoopia("<username>", "<password>");


$my_domains = $l->getDomains();


echo '<h1>My domains at Loopia</h1>';
echo '<ul>';


foreach($my_domains as $domain)
{
    echo '<li>' . $domain['domain'] . '</li>';
}


echo '</ul>';
?>