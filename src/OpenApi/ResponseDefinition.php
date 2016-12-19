<?php
/**
 * User: evaisse
 * Date: 12/12/2016
 * Time: 10:00
 */
namespace OpenApi;

/**
 * Class ResponseDefinition
 * @package OpenApi
 */
class ResponseDefinition implements \JsonSerializable, Referenceable
{

    /**
     * @var string response name
     */
    protected $name;

    /**
     * @var int $statusCode
     */
    protected $statusCode;

    /**
     * @var SchemaDefinition
     */
    protected $schema;

    /**
     * @var string A short description of the response. GFM syntax can be used for rich text representation.
     */
    protected $description;

    /**
     * @var ResponseHeaders
     */
    protected $headers;

    /**
     * @var ResponseExamples
     */
    protected $examples;

    /**
     * @param int                $statusCode  an http status code
     * @param string             $description A short description of the response. GFM syntax can be used for rich text representation.
     * @param SchemaDefinition   $schema      A schema definition
     * @param ResponseHeader[]   $headers     Header list for this response
     * @param ResponseExample[]  $examples    A list of response value examples
     */
    function __construct($statusCode, $description, SchemaDefinition $schema, $headers = [], $examples = [])
    {
        $this->name = $this->statusCode = (string)$statusCode;
        $this->description = $description;
        $this->schema = $schema;
        $this->headers = new ResponseHeaders($headers);
        $this->examples = new ResponseExamples($examples);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            "description" => $this->description,
            "schema"      => $this->schema->asRef(),
            "headers"     => $this->headers,
            "examples"    => $this->examples,
        ];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ResponseDefinition
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return SchemaReference
     */
    public function asRef()
    {
        return new SchemaReference($this->getName());
    }

}