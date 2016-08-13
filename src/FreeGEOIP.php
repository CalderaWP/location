<?php

namespace calderawp\location;

/**
 * Class FreeGEOIP
 *
 * Get GEO IP info via http://freegeoip.net/json/
 *
 * @package calderawp\location
 */
class FreeGEOIP extends GEOIP
{

	/**
	 * @inheritdoc
	 */
	protected function apiRoot() : string
	{
		return 'http://freegeoip.net/json/';
	}

	/**
	 * @inheritdoc
	 */
	protected function getApiUrl( string  $ip ) : string
	{
		return $this->apiRoot() . $ip;
	}
}