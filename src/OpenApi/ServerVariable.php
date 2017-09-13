<?php
/**
 * User: evaisse
 * Date: 12/09/2017
 * Time: 15:04
 */
namespace OpenApi;

/**
 * Class ServerVariable
 * @package OpenApi
 */
class ServerVariable implements \JsonSerializable
{

    /**
     * @var string[] An enumeration of string values to be used if the substitution options are from a limited set.
     */
    protected $enum;


    /**
     * @var string REQUIRED. The default value to use for substitution, and to send, if an alternate value is
     *             not supplied. Unlike the Schema Object's default, this value MUST be provided by the consumer.
     */
    protected $default;


    /**
     * @var string An optional description for the server variable. CommonMark syntax MAY be used for
     *             rich text representation.
     */
    protected $description;

    /**
     * ServerVariable constructor.
     *
     * @param string    $default
     * @param \string[] $enum
     * @param string    $description
     */
    public function __construct($default, array $enum = [], $description = null)
    {
        $this->enum = $enum;
        $this->default = $default;
        $this->description = $description;
    }


    /**
     * @return \string[]
     */
    public function getEnum()
    {
        return $this->enum;
    }

    /**
     * @param \string[] $enum
     * @return ServerVariable
     */
    public function setEnum($enum)
    {
        $this->enum = $enum;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param string $default
     * @return ServerVariable
     */
    public function setDefault($default)
    {
        $this->default = $default;

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
     * @return ServerVariable
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        return [

        ];
    }


}