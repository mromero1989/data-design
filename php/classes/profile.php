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
public function __construct($newProfileId, ?string $newProfileActivationToken, string $newProfileAtHandle, string $newProfileEmail)
{
		try {
				$this ->setProfileId($newProfileId);
				$this ->setProfileActivationToken($newProfileActivationToken);
				$this ->setProfileAtHandle($newProfileAtHandle);
				$this ->setProfileEmail($newProfileEmail);
				$this ->setProfileHash($newProfileHash);
				$this ->setProfilePhone($newProfilePhone);
				$this ->setProfileSalt($newProfileSalt);)
		}
		//determine which exception type was thrown
		catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
}

/**
 * accessor method for profile id
 *
 * @return Uuid value of profile id
 */

public function getProfileId() : Uuid {
	return ($this->profileId);
}

/**
 * mutator method profile id
 *
 * @param Uuid/string $newProfileId new value of profile Id
 * @throws \TypeError if $newProfileId is not Uuid
 */

public function setProfileId($newProfileId) : void {
		try {
				$uuid = self::validateUuid($newProfileId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
				$exceptionType = get_class($exception);
				throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the profile id
}

	/**
	 * accessor method for profile activation token
	 *
	 * @return string value of the activation token
	 */
	public function getProfileActivationToken() : ?string {
		return ($this->getProfileActivationToken);
	}

	/**
	 * mutator method for profile activation token
	 *
	 * @param string $newProfileActivationToken
	 * @throws \InvalidArgumentException if the token is not a string or insecure
	 * @throws \RangeException if the token is not exactly 32 characters
	 * @throws \TypeError if the activation token is not a string
	 */

	public function setProfileActivationToken(?string $newProfileActivationToken) : void {
		if($newProfileActivationToken === null) {
			$this->profileActivationToken = null;
			return;
		}
		$newProfileActivationToken = strtolower(trim($newProfileActivationToken));
		if(ctype_xdigit($newProfileActivationToken) === false) {
			throw(new\RangeException("profile activation token has to be 32"));
		}
		$this->profileActivationToken = $newProfileActivationToken;
}
}



