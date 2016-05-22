<?php

namespace Bones\CommonBundle\Controller;

use Bones\CommonBundle\Model\Location\CountryRepository;
use Bones\CommonBundle\Model\Location\StateRepository;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;

class LocationController extends FOSRestController
{

    public function countriesAction()
    {
        $countryList = $this->getCountryRepository()->findAll();
        $view = $this->view($countryList);

        return $this->handleView($view);
    }

    public function statesAction()
    {
        $stateList = $this->getStateRepository()->findAll();
        $view = $this->view($stateList);

        return $this->handleView($view);
    }

    public function statesByCountryCodeAction(Request $request, $countryCode)
    {
        $stateList = array();
        if ($countryCode = $request->get('countryCode')) {
            $stateList = $this->getStateRepository()->findAllByCountryCode($countryCode);
        }

        return $this->handleView($this->view($stateList));
    }

    /**
     * @return CountryRepository
     */
    private function getCountryRepository()
    {
        return $this->get('bones_intl.repository.location.country');
    }


    /**
     * @return StateRepository
     */
    private function getStateRepository()
    {
        return $this->get('bones_intl.repository.location.state');
    }


}
