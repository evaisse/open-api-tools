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
class Contact implements \JsonSerializable
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

    /**
     * @param string $name The identifying name of the contact person/organization.
     * @param string $email The URL pointing to the contact information. MUST be in the format of a URL.
     * @param string $url The email address of the contact person/organization. MUST be in the format of an email address.
     */
    function __construct($name, $email, $url)
    {
        $this->name = $name;
        $this->url = $url;
        $this->email = $email;
    }



    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $properties = [];
        foreach ($this as $k => $p) {
            $properties[$k] = $p;
        }
        return $properties;
    }


}