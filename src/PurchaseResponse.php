<?php

namespace Omnipay\Adyen\Message;

use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Common\Message\AbstractResponse;

class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface {

    /**
     * @return boolean False to always redirect the customer to Adyen.
     */
    public function isSuccessful() {
        return false;
    }

    /**
     * @return boolean True to always redirect the customer to Adyen.
     */
    public function isRedirect() {
        return true;
    }

    /**
     * @return string
     */
    public function getRedirectUrl() {
        return $this->getRequest()->getEndpoint() . 'pay.shtml?' . http_build_query($this->getRedirectData());
    }

    /**
     * Get the required redirect method (either GET or POST).
     *
     * @return string
     */
    public function getRedirectMethod() {
        return 'POST';
    }

    /**
     * Gets the redirect form data array, if the redirect method is POST.
     *
     * @return array
     */
    public function getRedirectData() {
        return $this->data;
    }
}
