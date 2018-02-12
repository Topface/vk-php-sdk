<?php

namespace VK\Exceptions\Api;

class ApiMethodException extends VKApiException {
    /**
     * ApiMethodException constructor.
     * @param string $message
     */
    public function __construct($message) {
        parent::__construct(3,  'Unknown method passed',  $message);
    }
}