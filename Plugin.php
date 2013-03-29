<?php
/**
 * Base class for a WordPress plugin.
 *
 * @author Mike Ems
 * @package Mvied
 */
class Mvied_Plugin extends Mvied_Modular {

	/**
	 * Plugin URL
	 *
	 * @var string
	 */
	protected $_plugin_url;

	/**
	 * Set Plugin Url
	 * 
	 * @param string $plugin_url
	 * @return object $this
	 */
	public function setPluginUrl( $plugin_url ) {
		$this->_plugin_url = $plugin_url;
		return $this;
	}

	/**
	 * Get Plugin Url
	 * 
	 * @param none
	 * @return string
	 */
	public function getPluginUrl() {
		return $this->_plugin_url;
	}

}