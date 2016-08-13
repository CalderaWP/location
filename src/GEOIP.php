<?php

namespace calderawp\location;

/**
 * Class GEOIP
 * @package calderawp\location
 */
abstract class GEOIP
{



	/**
	 * Queried IP
	 *
	 * @var string
	 */
	protected $ip;

	/**
	 * Location found
	 *
	 * @var Location
	 */
	protected $location;

	/**
	 * GEOIP constructor.
	 * @param string $ip IP to query
	 */
	public function __construct( string $ip ) {
		$this->ip = $ip;
	}

	/**
	 * Get created location
	 *
	 * @return Location
	 */
	public function get_location() : Location {
		return $this->location;
	}

	/**
	 * Query for location
	 *
	 * Will set Location object or throw exception
	 *
	 * @throws \Exception
	 */
	public function query(){
		$location = file_get_contents( $this->getApiUrl( $this->ip ) );
		if( is_object( $_location = json_decode( $location ) ) ){
			$this->location = new Location( $_location );
			return;
		}else{
			throw new \Exception( 'Could not create location' );
		}



	}

	/**
	 * Define root URL for API for
	 *
	 * @return string
	 */
	abstract protected function apiRoot() : string;

	/**
	 * Form URL for GET request
	 *
	 * @param string $ip
	 * @return string
	 */
	abstract protected function getApiUrl( string $ip ) : string;

}