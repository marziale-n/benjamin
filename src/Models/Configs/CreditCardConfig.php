<?php
namespace Ebanx\Benjamin\Models\Configs;

use Ebanx\Benjamin\Models\BaseModel;

class CreditCardConfig extends BaseModel
{
    const MAX_INSTALMENTS = 12;

    /**
     * Number of max instalments, defaults to 12
     *
     * @var integer
     */
    public $maxInstalments = self::MAX_INSTALMENTS;

    /**
     * Minimum instalment amount
     * Default varies by currency
     *
     * @var float
     */
    public $minInstalmentAmount = 0.0;

    /**
     * List of interest rate config objects
     *
     * @var array
     */
    public $interestRates = array();

    /**
     * Adds an interest rate config object for the credit card config
     *
     * @param integer $instalmentNumber The instalment number for this rate configuration
     * @param float   $rate              The interest rate to be applied
     * @return CreditCardConfig itself
     */
    public function addInterest($instalmentNumber, $rate)
    {
        $interestRates[] = new CreditCardInterestRateConfig(array(
            "instalmentNumber" => $instalmentNumber,
            "interestRate" => $rate
        ));

        return $this;
    }
}
