<?php
/**
 * User: evaisse
 * Date: 08/12/2016
 * Time: 17:49
 */
namespace OpenApi;

/**
 * Class ParametersDefinitionsCollection
 * @package OpenApi
 */
class ParametersDefinitionsCollection implements \JsonSerializable
{

    /**
     * @var Parameter[]
     */
    protected $items = [];

    /**
     * @param Parameter $definition
     * @return self
     */
    public function set(Parameter $definition)
    {
        $key = (string)$definition->getName();
        $this->items[$key] = $definition;
        return $this;
    }


    /**
     * @param string $key
     * @return Parameter|null
     */
    public function get($key)
    {
        return array_key_exists($key, $this->items) ? $this->items[$key] : null;
    }


    /**
     * @return Parameter[]
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
        return $this->items;
    }

}