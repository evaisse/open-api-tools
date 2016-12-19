<?php
/**
 * User: evaisse
 * Date: 12/12/2016
 * Time: 10:55
 */
namespace OpenApi;


/**
 * Class ResponseHeaders
 * @package OpenApi
 */
class ResponseHeaders implements \JsonSerializable
{

    /**
     * @var HeaderItem[]
     */
    protected $items = [];

    /**
     * @param HeaderItem[] $items
     */
    function __construct(array $items = [])
    {
        foreach ($items as $i) {
            $this->set($i);
        }
    }


    /**
     * @param HeaderItem $definition
     * @return self
     */
    public function set(HeaderItem $definition)
    {
        $key = (string)$definition->getName();
        $this->items[$key] = $definition;
        return $this;
    }


    /**
     * @param string $key
     * @return HeaderItem|null
     */
    public function get($key)
    {
        return array_key_exists($key, $this->items) ? $this->items[$key] : null;
    }


    /**
     * @return HeaderItem[]
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
        return !empty($this->items) ? $this->items : new \stdClass();
    }

}