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
class SchemaDefinition extends \ArrayObject implements \JsonSerializable, SchemaInterface
{

    /**
     * @var string name
     */
    protected $name;

    /**
     * @var SchemaReference
     */
    protected $ref;


    /**
     * @param string     $name
     * @param array|null $value
     */
    public function __construct($name, array $value = null)
    {
        $this->name = $name;
        parent::__construct($value);
        $this->ref = new SchemaReference($this);
        SchemaValidation::validateJsonSchema($value);
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
        return $this->ref->getLink();
    }

    /**
     * @return SchemaReference
     */
    public function asRef()
    {
        return $this->ref;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $schema = $this->getArrayCopy();
        // remove $schema prop since it's a non available prop for definitions
        unset($schema['$schema']);
        return $schema;
    }
}