<?php
/**
 * User: evaisse
 * Date: 15/12/2016
 * Time: 09:45
 */
namespace OpenApi;

/**
 * Class ResponsesCollection
 * @package OpenApi
 */
class ResponsesCollection implements \JsonSerializable
{

    /**
     * @var ResponseDefinition[]|SchemaReference[]
     */
    protected $items;


    /**
     * @param ResponseDefinition|SchemaReference $definitionOrReference
     * @return self
     */
    public function set($definitionOrReference)
    {
        /** @var ResponseDefinition|SchemaReference $definitionOrReference */
        $key = (string)$definitionOrReference->getName();
        $this->items[$key] = $definitionOrReference;
        return $this;
    }


    /**
     * @param string $key
     * @return ResponseDefinition|SchemaReference|null
     */
    public function get($key)
    {
        return array_key_exists($key, $this->items) ? $this->items[$key] : null;
    }


    /**
     * @return ResponseDefinition[]|SchemaReference[]
     */
    public function all()
    {
        return $this->items;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return empty($this->items) ? (object)$this->items : $this->items;
    }

}