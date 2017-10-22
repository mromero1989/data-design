<?php
namespace Edu\Cnm\DataDesign;

require_once("autoload.php");
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;

/**
 * This is the profile entity
 *
 * This stores profiles of users
 *
 * @author Michael Romero <m.romero1989@gmail.com>
 * @version 7.1
 **/

class profile implements \JsonSerializable {
	use ValidateDate;
	use ValidateUuid;
	/**
	 * id for this profile; this is the primary key
	 * @var Uuid $profileId
	 */
	private $profileId;
	/**
	 * token to verify the profile
	 * @var $profileActivationToken
	 */
	private $profileActivationToken;
	/**
	 * username of the profile
	 * @var string $profileAtHandle
	 */
	private $profileAtHandle;
	/**
	 * profile email
	 * @var string $profileEmail
	 */
	private $profileEmail;
	/**
	 * hash for profile password
	 * @var $profileHash
	 */
	private $profileHash;
	/**
	 * phone number for profile
	 * @var $profilePhone
	 */
	private $profilePhone;
	/**
	 * salt for profile password
	 */
	private $profileSalt;

	/**
	 * constructor for this profile
	 *
	 * @param uuid $newProfileId of this profile or null if a new profile
	 * @param string $newProfileActivationToken token to verify the profile
	 * @param string $newProfileAtHandle username of the profile
	 * @param string $newProfileEmail email of the profile
	 * @param string $newProfileHash password hash
	 * @param string $newProfilePhone phone number for profile
	 * @param string $newProfileSalt password salt
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings are too long, negative integers)
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 */


}

