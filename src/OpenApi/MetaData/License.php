<?php
/**
 * User: evaisse
 * Date: 08/12/2016
 * Time: 17:51
 */
namespace OpenApi\MetaData;

/**
 * Class License
 * @package OpenApi\MetaData
 */
class License implements \JsonSerializable
{
    /**
     * @var string Required. The license name used for the API.
     */
    protected $name;
    /**
     * @var string	A URL to the license used for the API. MUST be in the format of a URL.
     */
    protected $url;

    /**
     * @param string $name Required. The license name used for the API.
     * @param string $url  A URL to the license used for the API. MUST be in the format of a URL.
     */
    function __construct($name, $url)
    {
        $this->name = $name;
        $this->url = $url;
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