<?php
/**
 * User: evaisse
 * Date: 12/12/2016
 * Time: 09:35
 */
namespace OpenApi;

/**
 * Class SchemaDefinition
 * @package OpenApi
 */
class SchemaDefinition extends \ArrayObject implements \JsonSerializable
{

    /**
     * @var string name
     */
    protected $name;

    /**
     * @param string     $name
     * @param array|null $value
     */
    public function __construct($name, array $value = null)
    {
        $this->name = $name;
        parent::__construct($value);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getRefLink()
    {
        return "#/definitions/{$this->getName()}";
    }

    /**
     * @return array
     */
    public function asRef()
    {
        return ['$ref' => $this->getRefLink()];
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->getArrayCopy();
    }
}