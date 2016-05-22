<?php

namespace Bones\CommonBundle\Model\Money;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\Selectable;
use Doctrine\Common\Persistence\ObjectRepository;

class CurrencyRepository implements ObjectRepository, Selectable
{

    /**
     * @var Currency[]
     */
    protected $currencyList = array();

    public function __construct()
    {
        $this->currencyList = array(
            'EUR' => new Currency('EUR', "Euro", "€", "@ €", ",", "."),
            'USD' => new Currency('USD', "US Dollar", "$", "$ @", ".", ",")
        );
    }
    /**
     * Finds an object by its primary key / identifier.
     *
     * @param mixed $id The identifier.
     *
     * @return Currency The object.
     */
    public function find($id)
    {
        return (isset($this->currencyList[$id])) ? $this->currencyList[$id] : null;
    }

    /**
     * Finds all objects in the repository.
     *
     * @return array The objects.
     */
    public function findAll()
    {
        return $this->currencyList;
    }

    /**
     * Finds objects by a set of criteria.
     *
     * Optionally sorting and limiting details can be passed. An implementation may throw
     * an UnexpectedValueException if certain values of the sorting or limiting details are
     * not supported.
     *
     * @param array $criteria
     * @param array|null $orderBy
     * @param int|null $limit
     * @param int|null $offset
     *
     * @return array The objects.
     *
     * @throws \UnexpectedValueException
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        throw new \UnexpectedValueException("Not Implemented");
    }

    /**
     * Finds a single object by a set of criteria.
     *
     * @param array $criteria The criteria.
     *
     * @return object The object.
     *
     * @throws \Exception
     */
    public function findOneBy(array $criteria)
    {
        throw new \Exception("Not Implemented");
    }

    /**
     * Returns the class name of the object managed by the repository.
     *
     * @return string
     */
    public function getClassName()
    {
        return '\Bones\IntlBundle\Model\Money\Currency';
    }


    /**
     * Selects all elements from a selectable that match the expression and
     * returns a new collection containing these elements.
     *
     * @param Criteria $criteria
     *
     * @return Collection
     */
    public function matching(Criteria $criteria)
    {
        // TODO: Implement matching() method.
    }
}
