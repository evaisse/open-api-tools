<?php
/**
 * User: evaisse
 * Date: 08/12/2016
 * Time: 17:45
 */
namespace OpenApi;

/**
 * Class MetaData
 * @package OpenApi
 */
class MetaData implements \JsonSerializable
{
    /**
     * @var	string Required. The title of the application.
     */
    protected $title;
    /**
     * @var	string A short description of the application. GFM syntax can be used for rich text representation.
     */
    protected $description;
    /**
     * @var	string The Terms of Service for the API.
     */
    protected $termsOfService;
    /**
     * @var	MetaData\Contact Object	The contact information for the exposed API.
     */
    protected $contact;
    /**
     * @var	MetaData\License Object	The license information for the exposed API.
     */
    protected $license;
    /**
     * @var	string Required Provides the version of the application API (not to be confused with the specification version).
     */
    protected $version;

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return MetaData
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return MetaData
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getTermsOfService()
    {
        return $this->termsOfService;
    }

    /**
     * @param string $termsOfService
     * @return MetaData
     */
    public function setTermsOfService($termsOfService)
    {
        $this->termsOfService = $termsOfService;

        return $this;
    }

    /**
     * @return MetaData\Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param MetaData\Contact $contact
     * @return MetaData
     */
    public function setContact(MetaData\Contact $contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return MetaData\License
     */
    public function getLicense()
    {
        return $this->license;
    }

    /**
     * @param MetaData\License $license
     * @return MetaData
     */
    public function setLicense(MetaData\License $license)
    {
        $this->license = $license;

        return $this;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return MetaData
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
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
        $properties['version'] = (string)$properties['version'];

        return $properties;
    }


}