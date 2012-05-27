<?php
/**
 * Module Class for a WordPress plugin.
 * 
 * Each Module in the project will extend this base Module class.
 * Modules can be treated as independent plugins. Think of them as sub-plugins.
 * 
 * @author Mike Ems
 * @package Mvied
 */
class Mvied_Module {

	/**
	 * Plugin object that this module extends
	 *
	 * @var Mvied_Plugin
	 */
	protected $_plugin;

	/**
	 * Theme object that this module extends
	 *
	 * @var Mvied_Theme
	 */
	protected $_theme;

	/**
	 * Set Plugin
	 * 
	 * @param Mvied_Plugin $plugin
	 * @return object $this
	 * @uses Mvied_Plugin
	 */
	public function setPlugin( Mvied_Plugin $plugin ) {
		$this->_plugin = $plugin;		
		return $this;
	}

	/**
	 * Set Theme
	 * 
	 * @param Mvied_Theme $theme
	 * @return object $this
	 * @uses Mvied_Theme
	 */
	public function setTheme( Mvied_Theme $theme ) {
		$this->_theme = $theme;
		return $this;
	}

	/**
	 * Get Plugin
	 * 
	 * @param none
	 * @return Mvied_Plugin
	 */
	public function getPlugin() {
		if ( ! isset($this->_plugin) ) {
			die('Module ' . __CLASS__ . ' missing Plugin dependency.');
		}
		
		return $this->_plugin;
	}

	/**
	 * Get Theme
	 * 
	 * @param none
	 * @return Mvied_Theme
	 */
	public function getTheme() {
		if ( ! isset($this->_theme) ) {
			die('Module ' . __CLASS__ . ' missing Theme dependency.');
		}

		return $this->_theme;
	}

}