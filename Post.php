<?php
/**
 * Post Object
*
* @author Mike Ems
* @package Mvied
*/
class Mvied_Post {

	/**
	 * Instantiate Post from ID
	 *
	 * @param int $id
	 * @return void
	 */
	public function __construct( $id ) {
		if ( ! isset($id) || ! get_post($id) ) {
			throw new Exception("Invalid Post ID '" . $id . "'.");
		}
		$this->load( get_post($id, ARRAY_A) );
	}

	/**
	 * Get Post Meta
	 *
	 * @param string $meta_key
	 * @param bool $single Return single value or array, default true
	 * @return mixed
	 */
	public function getPostMeta( $meta_key, $single = true ) {
		return get_post_meta($this->ID, $meta_key, $single);
	}

	/**
	 * Update Post Meta
	 *
	 * @param string $meta_key
	 * @param mixed $meta_value
	 * @return mixed
	 */
	public function updatePostMeta($meta_key, $meta_value) {
		return update_post_meta($this->ID, $meta_key, $meta_value);
	}

	/**
	 * Format objec to array
	 * 
	 * @param none
	 * @return array
	 */
	public function toArray() {
		return (array) $this;
	}

	/**
	 * Load from Array
	 *
	 * @param array $array
	 * @return mixed
	 */
	public function load( $array = array() ) {
		foreach($array as $key => $value) {
			$this->$key = $value;
		}
	}

	/**
	 * Save
	 *
	 * @param none
	 * @return void
	 */
	public function save() {
		return wp_update_post( $this->toArray() );
	}

}