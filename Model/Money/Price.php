<?php

namespace Bones\IntlBundle\Model\Money;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Price
 *
 * @JMs\ReadOnly
 */
class Price
{

    /**
     * @var double;
     *
     * @JMS\Type("double")
     */
    private $amount;

    /**
     * @var Currency
     *
     * @JMS\Type("Bones\IntlBundle\Model\Money\Currency");
     */
    private $currency;


    /**
     * @param double   $amount
     * @param Currency $currency
     */
    public function __construct($amount, Currency $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return Currency
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function format()
    {
        $format = $this->currency->getFormat();

        $amountInString = $this->amount;
        $parts = explode(".", $amountInString);

        $hasDecimal = (count($parts) > 1);

        $reversedIntAmount = strrev($parts[0]);
        $amountInString = '';

        for ($i = 0; $i < strlen($reversedIntAmount); $i++) {
            if ($i != 0 && $i%3 == 0) {
                $amountInString .= $this->currency->getThousandsDivider();
            }
            $amountInString .= $reversedIntAmount[$i];
        }

        $amountInString = strrev($amountInString);

        $decimal = ($hasDecimal) ? $parts[1] : "00";
        $amountInString .= $this->currency->getDecimalPoint().$decimal;

        return str_replace(Currency::FORMAT_PLACEHOLDER, $amountInString, $format);
    }
}
