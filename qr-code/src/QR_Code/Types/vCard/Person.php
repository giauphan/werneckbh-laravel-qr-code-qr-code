<?php

namespace QR_Code\Types\vCard;

use QR_Code\Contracts\VCardItem;

/**
 * Class Person
 *
 * QR Code Generator for PHP is distributed under MIT
 * Copyright (C) 2018 Bruno Vaula Werneck <brunovaulawerneck at gmail dot com>
 *
 * @package QR_Code\Types\vCard
 */
class Person implements VCardItem
{
    /**
     * @var string
     */
    protected $firstName;
    /**
     * @var string
     */
    protected $lastName;
    /**
     * @var string
     */
    protected $title;
    /**
     * @var string
     */
    protected $email;
    /**
     * @var string
     */
    protected $org;
    /**
     * @var string
     */
    protected $orgTitle;
    /**
     * @var string
     */
    private $job;
    /**
     * @var string
     */

    protected $company;

    /**
     * Person constructor.
     * @param string $firstName
     * @param string $lastName
     * @param string $title
     * @param string $email
     * @param string $org
     * @param string $orgTitle
     * @param string $company
     */
    public function __construct(string $firstName, string $lastName, string $title = '', string $email, string $company = '', string $org = '', string $orgTitle = '')
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->title = $title;
        $this->email = $email;
        $this->org = $org;
        $this->orgTitle = $orgTitle;
        $this->company = $company;
    }

    /**
     * @return string
     */
    public function getEmailStr(): string
    {
        return "EMAIL:{$this->email}\n";
    }

    /**
     * @return string
     */
    protected function getFullName(): string
    {
        return "{$this->firstName} {$this->lastName}";
    }

    /**
     * @return string
     */
    public function getCompany(): string
    {
        return "ORG:{$this->company}\n";
    }
    /**
     * @return string
     */
    protected function getName(): string
    {
        $response = "N:{$this->lastName};{$this->firstName};;";
        if ($this->title) {
            $response .= "{$this->title};";
        }

        return $response;
    }
    public function setJob(string $job)
    {
        $this->job = $job;
    }

    public function getJob(): string
    {
        return $this->job;
    }

    public function getFormattedJob(): string
    {
        return "TITLE:{$this->job}\n";
    }
    /**
     * Gets vCard Item Text
     *
     * @return string
     */
    public function __toString(): string
    {
        $response = "{$this->getName()}\n";
        $response .= "FN:{$this->getFullName()}\n";
        $response .= "ORG:{$this->org}\n";
        $response .= "TITLE:{$this->orgTitle}\n";

        return $response;
    }
}
