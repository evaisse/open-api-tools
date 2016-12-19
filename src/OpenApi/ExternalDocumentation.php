<?php
/**
 * User: evaisse
 * Date: 08/12/2016
 * Time: 17:47
 */
namespace OpenApi;

/**
 * Class ExternalDocumentation
 * @package OpenApi
 */
class ExternalDocumentation implements \JsonSerializable
{

    /**
     * @var string A short description of the target documentation. GFM syntax can be used for rich text representation.
     */
    protected $description;
    
    /**
     * @var string The URL for the target documentation. Value MUST be in the format of a URL.
     */
    protected $url;

    /**
     * ExternalDocumentation constructor.
     *
     * @param string $url
     * @param string $description
     */
    public function __construct($url, $description = "")
    {
        $this->description = $description;
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }


}