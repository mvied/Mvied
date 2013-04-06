<?php
/**
 * Model class for a WordPress theme or plugin.
 *
 * @author Mike Ems
 * @package Mvied
 */
class Mvied_Model {

	/**
	 * Post
	 *
	 * @var Mvied_Post
	 */
	protected $_post;

	/**
	 * Post ID
	 *
	 * @var int
	 */
	public $ID;

	/**
	 * Name
	 *
	 * @var string
	 */
	public $name;

	/**
	 * Instantiate Model from ID
	 *
	 * @param int $id
	 * @return void
	 */
	public function __construct( $id ) {
		$this->setPost(new Mvied_Post($id));
		$this->ID = $this->getPost()->ID;
		$this->name = $this->getPost()->post_title;

		$reflect = new ReflectionClass($this);
		$properties = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
		foreach($properties as $property) {
			$property = $property->getName();
			if ( !isset($this->$property) ) {
				$this->$property = $this->getPost()->getPostMeta($property);
			}
		}
	}

	/**
	 * Getter
	 *
	 * @param string $property
	 * @return mixed
	 */
	public function __get( $property ) {
		return $this->getPost()->getPostMeta($property);
	}

	/**
	 * Get Post
	 *
	 * @param none
	 * @return Mvied_Post
	 */
	public function getPost() {
		return $this->_post;
	}

	/**
	 * Set Post
	 *
	 * @param Mvied_Post $post
	 * @return Mvied_Model
	 */
	public function setPost( Mvied_Post $post ) {
		$this->_post = $post;
		return $this;
	}

	/**
	 * Load from Array
	 *
	 * @param array $array
	 * @return mixed
	 */
	public function load( $array = array() ) {
		foreach($array as $key => $value) {
			if ( property_exists($this, $key) ) {
				$this->$key = $value;
			}
		}
	}

	/**
	 * Save
	 *
	 * @param none
	 * @return void
	 */
	public function save() {
		$reflect = new ReflectionClass($this);
		$properties = $reflect->getProperties(ReflectionProperty::IS_PUBLIC);
		foreach($properties as $property) {
			$property = $property->getName();
			if ( !in_array($property, array('ID','name')) && strpos($property, '_') !== 0 ) {
				$this->getPost()->updatePostMeta($property, $this->$property);
			}
		}
	}

}