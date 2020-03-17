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