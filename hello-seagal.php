<?php
/**
 * @package Hello_seagal
 * @version 1.0
 */
/*
Plugin Name: Hello Seagal
Description: This was inspired by the Standard Hello Dolly Plugin, it displays random Steven Seagal quotes in the top right of the WordPress admin.
Author: David Peach
Version: 1.0
Author URI: http://davidpeach.co.uk/
*/

function hello_seagal_get_line() {
	$lines = "Anybody know why Richie did Bobby Lupo?
But there aint nobody upstairs!
You see this face? This is a happy face. You'll be lucky to be as happy as I am.
You f**k with my family, you die.
Oh, I know what you're thinking. Mine's bigger than yours, right? It's not fair.
I gotta go beep somebody.
That's for my wife, f**k you and die.
Richie was always into something bad.
What does it take to change the essence of a man?
I hope they weren't triplets.
I'm gonna take you to the bank, Senator Trent.
I'm just a cook.
Nobody beats me in the kitchen.";

	$lines = explode( "\n", $lines );

	return wptexturize( $lines[ mt_rand( 0, count( $lines ) - 1 ) ] );
}

function hello_seagal() {
	$chosen = hello_seagal_get_line();
	echo "<p id='seagal'>$chosen</p>";
}

add_action( 'admin_notices', 'hello_seagal' );

function seagal_css() {
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#seagal {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'seagal_css' );
?>
