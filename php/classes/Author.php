<?php
namespace cfiniello\ObjectOrientedDesign;

require_once("autoload.php");
require_once(dirname(__DIR__) . "/vendor/autoload.php");

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
		try {
			//TODO: fix reference error.
			//$uuid = self::validateUuid($newAuthorId);
			$uuid = $newAuthorId;
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}

		$this->authorId = $uuid;
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
		$newAuthorActivationToken = trim($newAuthorActivationToken);
		//TODO: verify what filter options we would use for the activation token
		$newAuthorActivationToken = filter_var($newAuthorActivationToken, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorActivationToken) === true) {
			throw(new \InvalidArgumentException("activation token is empty or insecure"));
		}

		// verify the token will fit in the database
		if(strlen($newAuthorActivationToken) > 32) {
			throw(new \RangeException("activation token too large"));
		}

		$this->authorActivationToken = $newAuthorActivationToken;
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
		$newAuthorAvatarUrl = trim($newAuthorAvatarUrl);
		//TODO: verify what filter options we would use for the avatar url
		$newAuthorAvatarUrl = filter_var($newAuthorAvatarUrl, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorAvatarUrl) === true) {
			throw(new \InvalidArgumentException("avatar url is empty or insecure"));
		}

		// verify the url will fit in the database
		if(strlen($newAuthorAvatarUrl) > 255) {
			throw(new \RangeException("avatar url too large"));
		}

		$this->authorAvatarUrl = $newAuthorAvatarUrl;
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
		$newAuthorEmail = trim($newAuthorEmail);
		$newAuthorEmail = filter_var($newAuthorEmail, FILTER_VALIDATE_EMAIL);
		if(empty($newAuthorEmail) === true) {
			throw(new \InvalidArgumentException("email is empty or insecure"));
		}

		// verify the url will fit in the database
		if(strlen($newAuthorEmail) > 128) {
			throw(new \RangeException("email too large"));
		}

		$this->authorEmail = $newAuthorEmail;
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
		$newAuthorHash = trim($newAuthorHash);
		//TODO: verify what filter options we would use for the hash
		$newAuthorHash = filter_var($newAuthorHash, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorHash) === true) {
			throw(new \InvalidArgumentException("hash is empty or insecure"));
		}

		// verify the hash will fit in the database
		if(strlen($newAuthorHash) > 97) {
			throw(new \RangeException("hash is too large"));
		}

		$this->authorHash = $newAuthorHash;
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
		$newAuthorUsername = trim($newAuthorUsername);
		//TODO: verify what filter options we would use for the username
		$newAuthorUsername = filter_var($newAuthorUsername, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newAuthorUsername) === true) {
			throw(new \InvalidArgumentException("username is empty or insecure"));
		}

		// verify the username will fit in the database
		if(strlen($newAuthorUsername) > 32) {
			throw(new \RangeException("username is too large"));
		}

		$this->authorUsername = $newAuthorUsername;
	}

	/**
	 * inserts this author into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo) : void {

		// create query template
		$query = "INSERT INTO author(authorId, authorActivationToken, authorAvatarUrl, authorEmail, authorHash, authorUsername) 
						VALUES(:authorId, :authorActivationToken, :authorAvatarUrl, :authorEmail, :authorHash, :authorUsername)";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = ["authorId" => $this->authorId->getBytes(),
							"authorActivationToken" => $this->authorActivationToken,
							"authorAvatarUrl" => $this->authorAvatarUrl,
							"authorEmail" => $this->authorEmail,
							"authorHash" => $this->authorHash,
							"authorUsername" => $this->authorUsername];
		$statement->execute($parameters);
	}

	/**
	 * updates this Author in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo) : void {

		// create query template
		$query = "UPDATE author 
						SET authorActivationCode = :authorActivationCode, authorAvatarUrl = :authorAvatarUrl, authorEmail = :authorEmail,
							authoHash = :authorHash, authorUsername = :authoUsername 
						WHERE authorId = :authorId";
		$statement = $pdo->prepare($query);

		$parameters = ["authorId" => $this->authorId->getBytes(),
							"authorActivationToken" => $this->authorActivationToken,
							"authorAvatarUrl" => $this->authorAvatarUrl,
							"authorEmail" => $this->authorEmail,
							"authorHash" => $this->authorHash,
							"authorUsername" => $this->authorUsername];
		$statement->execute($parameters);
	}

	/**
	 * deletes this Author from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo) : void {

		// create query template
		$query = "DELETE FROM author WHERE authorId = :authorId";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holder in the template
		$parameters = ["authorId" => $this->authorId->getBytes()];
		$statement->execute($parameters);
	}

	/**
	 * gets the Author by authorId
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param Uuid|string $authorId author id to search for
	 * @return Author|null Author found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when a variable are not the correct data type
	 **/
	public static function getTweetByTweetId(\PDO $pdo, $authorId) : ?Author {
		// sanitize the tweetId before searching
		try {
			$authorId = self::validateUuid($authorId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}

		// create query template
		$query = "SELECT authorId, authorActivationToken, authorAvatarUrl, authorEmail, authorHash, authorUsername 
						FROM author 
						WHERE authorId = :authorId";
		$statement = $pdo->prepare($query);

		// bind the tweet id to the place holder in the template
		$parameters = ["authorId" => $authorId->getBytes()];
		$statement->execute($parameters);

		// grab the author from mySQL
		try {
			$author = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$author = new Author($row["authorId"], $row["authorActivationToken"], $row["authorAvatarUrl"], $row["authorEmail"],
											$row["authorHash"], $row["authorUsername"]);
			}
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($author);
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