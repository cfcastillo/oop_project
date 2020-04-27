<?php

//sample class for soldier care package demonstrating function stubs
class Donation {

	/**
	 * This function returns all donations for a specified profileId (donor)
	 * @param PDO $pdo
	 * @param string $donorId
	 * @return SPLFixedArray
	 */
	public function getDonationsByDonorId(\PDO $pdo, string $donorId) : \SPLFixedArray{
		return new SplFixedArray();
	}

	/**
	 * This function returns a single donation for a specified donationId
	 * @param PDO $pdo
	 * @param string $donationId
	 * @return SPLFixedArray
	 */
	public function getDonationByDonationId(\PDO $pdo, string $donationId) : \SPLFixedArray {
		return new SplFixedArray();
	}

}