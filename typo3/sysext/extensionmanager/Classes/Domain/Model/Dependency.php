<?php
namespace TYPO3\CMS\Extensionmanager\Domain\Model;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */
/**
 * Main extension model
 *
 * @author Susanne Moog <typo3@susannemoog.de>
 */
class Dependency extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * @var string
	 */
	protected $identifier = '';

	/**
	 * @var string
	 */
	protected $lowestVersion = '';

	/**
	 * @var string
	 */
	protected $highestVersion = '';

	/**
	 * @var string
	 */
	protected $type = '';

	/**
	 * @var array
	 */
	static protected $dependencyTypes = array(
		'depends',
		'conflicts',
		'suggests'
	);

	/**
	 * @var array
	 */
	static public $specialDependencies = array(
		'typo3',
		'php'
	);

	/**
	 * @param string $highestVersion
	 * @return void
	 */
	public function setHighestVersion($highestVersion) {
		$this->highestVersion = $highestVersion;
	}

	/**
	 * @return string
	 */
	public function getHighestVersion() {
		return $this->highestVersion;
	}

	/**
	 * @param string $identifier
	 * @return void
	 */
	public function setIdentifier($identifier) {
		$this->identifier = $identifier;
	}

	/**
	 * @return string
	 */
	public function getIdentifier() {
		return $this->identifier;
	}

	/**
	 * @param string $lowestVersion
	 * @return void
	 */
	public function setLowestVersion($lowestVersion) {
		$this->lowestVersion = $lowestVersion;
	}

	/**
	 * @return string
	 */
	public function getLowestVersion() {
		return $this->lowestVersion;
	}

	/**
	 * @param string $type
	 * @throws \TYPO3\CMS\Extensionmanager\Exception\ExtensionManagerException if no valid dependency type was given
	 * @return void
	 */
	public function setType($type) {
		if (in_array($type, self::$dependencyTypes)) {
			$this->type = $type;
		} else {
			throw new \TYPO3\CMS\Extensionmanager\Exception\ExtensionManagerException($type . ' was not a valid dependency type.');
		}
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

}
