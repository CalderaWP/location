# Ip to GeoIP Utility
Turns an IP address into GeoIP data.

<strong>Requires PHP7</strong>
## Install
`composer require calderawp/location`

## Usage
Find IP via http://freegeoip.net/ :

```
    	$geo = new FreeGEOIP( '1.2.3.5' );
    	$geo->query();
    	$location = $geo->get_location();
```

Free GEOIP is rate limitted, you can deploy your own instance. But then you will need to write your own handler class. Here is an example, assuming your API is at `http://HiRoy.club/geo` :

```
    	class MyGeoIP extends GEOIP
    	{
    	
    		/**
    		 * @inheritdoc
    		 */
    		protected function apiRoot() : string
    		{
    			return 'http://HiRoy.club/geo/json/';
    		}
    	
    		/**
    		 * @inheritdoc
    		 */
    		protected function getApiUrl( string  $ip ) : string
    		{
    			return $this->apiRoot() . $ip;
    		}
    	}
```


### Copyright 2016 CalderaWP LLC & Josh Pollock. Licensed under the terms of the GNU GPL version 2 or later. Please share with your neighbor.