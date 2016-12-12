<?php
/**
 * User: evaisse
 * Date: 12/12/2016
 * Time: 11:06
 */
namespace OpenApi;

/**
 * Class ResponseExample
 * @package OpenApi
 */
class ResponseExample implements \JsonSerializable
{

    /**
     * @var string content-type for this example
     */
    protected $contentType;

    /**
     * @var mixed
     */
    protected $example;

    /**
     * @param string $contentType
     * @param mixed  $example
     */
    function __construct($contentType, $example)
    {
        $this->contentType = $contentType;
        $this->example = $example;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->example;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @return mixed
     */
    public function getExample()
    {
        return $this->example;
    }




}