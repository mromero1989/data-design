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

class Profile implements \JsonSerialize {
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
public function __construct($newProfileId, ?string $newProfileActivationToken, string $newProfileAtHandle, string $newProfileEmail, string $newProfileHash, string $newProfilePhone, string $newProfileSalt)
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

/*
 * accessor method for profile handle
 *
 * @return string value of profile handle
 */

public function getProfileAtHandle() : string {
		return ($this->profileAtHandle);
}

	/**
	 * mutator method for user name
	 *
	 * @param string $newProfileAtHandle new value of user name
	 * @throws \InvalidArgumentException if $newProfileAtHandle is not a string or insecure
	 * @throws \RangeException if $newProfileAtHandle is > 140 characters
	 * @throws \TypeError if $newProfileAtHandle is not a string
	 */

public function setProfileAtHandle(string $newProfileAtHandle) : void {
		// verify the profile handle is secure
		$newProfileAtHandle = trim($newProfileAtHandle);
		$newProfileAtHandle = filter_var($newProfileAtHandle, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfileAtHandle) === true) {
				throw(new \InvalidArgumentException("profile handle is empty or insecure"));
		}
		// verify the profile handle will fit in the database
		if(strlen($newProfileAtHandle) > 140) {
			throw(new \RangeException("Profile Handle is too large"));
		}
		// store the profile handle
		$this->profileAtHandle = $newProfileAtHandle;
}

/**
 * Accessor method for email
 *
 * @return string value of email
 */

public function getProfileEmail() : string{
		return $this->profileEmail;
}

/**
 * mutator method for email
 *
 * @param string $newProfileEmail new value of email
 * @throws \InvalidArgumentException if $newProfileEmail is not valid email or insecure
 * @throws \RangeException if $newProfileEmail is > 128 characters
 * @throws \TypeError if $newProfileEmail is not a string
 */

public function setProfileEmail(string $newProfileEmail) : void {
		// verify the email is secure
		$newProfileEmail = trim($newProfileEmail);
		$newProfileEmail = filter_var($newProfileEmail, FILTER_VALIDATE_EMAIL);
		if(empty($newProfileEmail) === true) {
			throw(new \InvalidArgumentException("profile email is empty or insecure"));
		}
		// verify the email will fit in the database
		if(strlen($newProfileEmail) > 128) {
			throw(new \RangeException("Profile email is too large"));
		}
		// store the email
		$this->profileEmail = $newProfileEmail;
}

/**
 * accessor method for profile hash
 *
 * @return string value of hash
 */
public function getProfileHash() : string {
		return $this->profileHash;
}

	/**
	 * mutator method for profile hash password
	 *
	 * @param string $newProfileHash
	 * @throws \InvalidArgumentException if the hash is not secure
	 * @throws \RangeException if the hash is not 128 characters
	 * @throws \TypeError if profile hash is not a string
	 **/

	public function setProfileHash(string $newProfileHash) : void {
		// enforce that the hash is properly formatted
		$newProfileHash = trim($newProfileHash);
		$newProfileHash = strtolower($newProfileHash);
		if(empty($newProfileHash) === true) {
			throw(new \InvalidArgumentException("Profile Hash is empty or insecure"));
		}
		// enforce that the hash is a string representation of a hexadecimal
		if(!ctype_xdigit($newProfileHash)) {
			throw(new \InvalidArgumentException("Profile Hash is empty or insecure"));
		}
		// enforce that the hash is exacly 128 characters
		if(strlen($newProfileHash) !== 128) {
			throw(new \RangeException("Profile Hash must be 128 characters"));
		}
		// store the hash
		$this->profileHash = $newProfileHash;
	}
	/**
	 * accessor method for profile phone
	 *
	 * @return string value of profile phone
	 */

	public function getProfilePhone() : string {
		return ($this->profilePhone);
	}

	/**
	 * mutator method for profile phone
	 *
	 * @param string $newProfilePhone new value of handle
	 * @throws \InvalidArgumentException if $newProfilePhone is not a string or insecure
	 * @throws \RangeException if $newProfilePhone is > 128 characters
	 * @throws \TypeError if $newProfilePhone is not a string
	 **/
	public function setProfilePhone(string $newProfilePhone) : void {
		// verify the phone is secure
		$newProfilePhone = trim($newProfilePhone);
		$newProfilePhone = filter_var($newProfilePhone, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newProfilePhone) === true) {
			throw(new \InvalidArgumentException("Profile phone is empty or insecure"));
		}
		// verify the phone will fit in the database
		if(strlen($newProfilePhone) > 128) {
			throw(new \RangeException("profile phone is too large"));
		}
		// store the profile phone
		$this->profilePhone = $newProfilePhone;
	}

	/**
	 * Accessor method for profile salt
	 *
	 * @return string value of profile salt
	 **/
	public function getProfileSalt() : string {
		return $this->profileSalt;
	}

	/**
	 * mutator method for profile salt
	 *
	 * @param string $newProfileSalt new value of profile salt
	 * @throws \InvalidArgumentException if $newProfileSalt is not a string or insecure
	 * @throws \RangeException if the salt is not 64 characters
	 * @throws \TypeError if $newProfileSalt is not a string
	 **/

	public function setProfileSalt(string $newProfileSalt) : void {
		//verify the salt is formatted
		$newProfileSalt = trim($newProfileSalt);
		$newProfileSalt = strtolower($newProfileSalt);
		//verify the string is in hexadecimal
		if(!ctype_xdigit($newProfileSalt)) {
			throw(new \InvalidArgumentException("Profile hash is empty or insecure"));
		}
		//verify the salt is 64 characters.
		if(strlen($newProfileSalt) !== 64) {
			throw(new \RangeException("Profile salt must be 64 characters"));
		}
		//store the salt
		$this->profileSalt = $newProfileSalt;
	}
}



