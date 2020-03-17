<?php
namespace cfiniello\ObjectOrientedDesign;

require_once("autoload.php");
require_once(dirname(__DIR__) . "/vendor/autoload.php");

use Deepdivedylan\DataDesign\ValidateDate;
use Deepdivedylan\DataDesign\ValidateUuid;
use Ramsey\Uuid\Uuid;

/**
 * Class Author
 * @package cfiniello\ObjectOrientedDesign
 */
class Author implements \JsonSerializable {
	use ValidateDate;
	use ValidateUuid;

	/**
	 * @var
	 */
	private $authorId;
	private $authorActivationToken;
	private $authorAvatarUrl;
	private $authorEmail;
	private $authorHash;
	private $authorUsername;

	/**
	 * Author constructor.
	 * @param $newAuthorId
	 * @param $newAuthorActivationToken
	 * @param $newAuthorAvatarUrl
	 * @param $newAuthorEmail
	 * @param $newAuthorHash
	 * @param $newAuthorUsername
	 */
	public function __construct($newAuthorId, $newAuthorActivationToken, $newAuthorAvatarUrl, $newAuthorEmail, $newAuthorHash, $newAuthorUsername){
		try{
			$this->setAuthorId($newAuthorId);
			$this->setAuthorActivationToken($newAuthorActivationToken);
			$this->setAuthorAvatarUrl($newAuthorAvatarUrl);
			$this->setAuthorEmail($newAuthorEmail);
			$this->setAuthorHash($newAuthorHash);
			$this->setAuthorUsername($newAuthorUsername);
		} catch (\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception){
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for author id
	 * @return Uuid value of author id
	 */
	public function getAuthorId() : Uuid {
		return ($this->authorId);
	}

	/**
	 * mutator method for author id
	 * @param Uuid|string $newAuthorId new value of author id
	 * @throws \TypeError if $newAuthorId is not a uuid
	 */
	public function setAuthorId($newAuthorId) : void {
		return;
	}

	/**
	 * accessor method for author activation token
	 * @return string value of author activation token
	 */
	public function getAuthorActivationToken() : string {
		return ($this->authorActivationToken);
	}

	/**
	 * mutator method for author activation token
	 * @param string $newAuthorActivationToken new value of author activation token
	 * @throws TODO
	 */
	public function setAuthorActivationToken($newAuthorActivationToken) : void {
		return;
	}

	/**
	 * accessor method for author avatar url
	 * @return string value of author avatar url
	 */
	public function getAuthorAvatarUrl() : string {
		return ($this->authorAvatarUrl);
	}

	/**
	 * mutator method for author avatar url
	 * @param string $newAuthorAvatarUrl new value of author avatar url
	 * @throws TODO
	 */
	public function setAuthorAvatarUrl($newAuthorAvatarUrl) : void {
		return;
	}

	/**
	 * accessor method for author email
	 * @return string value of author email
	 */
	public function getAuthorEmail() : string {
		return ($this->authorEmail);
	}

	/**
	 * mutator method for author email
	 * @param string $newAuthorEmail new value of author email
	 * @throws TODO
	 */
	public function setAuthorEmail($newAuthorEmail) : void {
		return;
	}

	/**
	 * accessor method for author hash
	 * @return string value of author hash
	 */
	public function getAuthorHash() : string {
		return ($this->authorHash);
	}

	/**
	 * mutator method for author hash
	 * @param string $newAuthorHash new value of author hash
	 * @throws TODO
	 */
	public function setAuthorHash($newAuthorHash) : void {
		return;
	}

	/**
	 * accessor method for author username
	 * @return string value of author username
	 */
	public function getAuthorUsername() : string {
		return ($this->authorUsername);
	}

	/**
	 * mutator method for author username
	 * @param string $newAuthorUsername new value of author username
	 * @throws TODO
	 */
	public function setAuthorUsername($newAuthorUsername) : void {
		return;
	}

	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() : array {
		$fields = get_object_vars($this);

		$fields["authorId"] = $this->authorId->toString();
		$fields["authorActivationToken"] = $this->authorActivationToken->toString();
		$fields["authorAvatarUrl"] = $this->authorAvatarUrl->toString();
		$fields["authorEmail"] = $this->authorEmail->toString();
		$fields["authorHash"] = $this->authorHash->toString();
		$fields["authorUsername"] = $this->authorUsername->toString();

		return($fields);
	}
}