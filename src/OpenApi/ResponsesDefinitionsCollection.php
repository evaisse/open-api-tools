<?php
/**
 * User: evaisse
 * Date: 08/12/2016
 * Time: 17:48
 */
namespace OpenApi;

/**
 * Class ResponsesDefinitionsCollection
 * @package OpenApi
 */
class ResponsesDefinitionsCollection implements \JsonSerializable
{

    /**
     * @var ResponseDefinition[]
     */
    protected $items = [];

    /**
     * @param ResponseDefinition $definition
     * @return self
     */
    public function set(ResponseDefinition $definition)
    {
        $key = (string)$definition->getName();
        $this->items[$key] = $definition;
        return $this;
    }


    /**
     * @param string $key
     * @return ResponseDefinition|null
     */
    public function get($key)
    {
        return array_key_exists($key, $this->items) ? $this->items[$key] : null;
    }


    /**
     * @return ResponseDefinition[]
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