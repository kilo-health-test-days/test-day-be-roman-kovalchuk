<?php

namespace App\DataObject;

use Symfony\Component\HttpFoundation\Request;

class CustomerRequest
{
    private string $phone;
    private string $email;
    private string $push_channel;

    public function __construct(Request $request)
    {
        $requestData = json_decode($request->getContent());

        $this->phone = $requestData->phone;
        $this->email = $requestData->email;
        $this->push_channel = $requestData->push_channel;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPushChannel(): string
    {
        return $this->push_channel;
    }
}