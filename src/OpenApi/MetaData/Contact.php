<?php
/**
 * User: evaisse
 * Date: 08/12/2016
 * Time: 17:50
 */
namespace OpenApi\MetaData;

/**
 * Class Contact
 * @package OpenApi\MetaData
 */
class Contact
{
    /**
     * @var	string	The identifying name of the contact person/organization.
     */
    protected $name;
    /**
     * @var	string	The URL pointing to the contact information. MUST be in the format of a URL.
     */
    protected $url;
    /**
     * @var	string	The email address of the contact person/organization. MUST be in the format of an email address.
     */
    protected $email;
}