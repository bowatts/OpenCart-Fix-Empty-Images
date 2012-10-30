<?php

/*----------------------------------------
	Open Cart - Fix Empty Images
	-	This script will find any empty
		image field from each product and
		set it to the no_image.jpg default
		no image file
----------------------------------------*/

require_once( 'config.php' );

$con = mysql_connect( DB_HOSTNAME, DB_USERNAME, DB_PASSWORD );
if ( !$con )
{
	die( 'Could not connect: ' . mysql_error() );
}

mysql_select_db( DB_DATABASE, $con );

$result = mysql_query( "SELECT * FROM product" );
while( $row = mysql_fetch_array( $result ) )
{
	if( empty( $row['image'] ) )
	{
		//update image
		mysql_query( "UPDATE product SET image='no_image.jpg' WHERE product_id='" . $row['product_id'] . "' " );
	}
}

mysql_close( $con );

?>