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
class License
{
    /**
     * @var string Required. The license name used for the API.
     */
    protected $name;
    /**
     * @var string	A URL to the license used for the API. MUST be in the format of a URL.
     */
    protected $url;
}