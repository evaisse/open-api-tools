<?php
/**
 * User: evaisse
 * Date: 12/12/2016
 * Time: 10:59
 */
namespace OpenApi;

/**
 * Class ResponseExamples
 * @package OpenApi
 */
class ResponseExamples implements \JsonSerializable
{

    /**
     * @var ResponseExample[]
     */
    protected $items = [];


    /**
     * @param ResponseExample[] $items
     */
    function __construct(array $items = [])
    {
        foreach ($items as $i) {
            $this->set($i);
        }
    }

    /**
     * @param ResponseExample $definition
     * @return self
     */
    public function set(ResponseExample $definition)
    {
        $key = (string)$definition->getContentType();
        $this->items[$key] = $definition;
        return $this;
    }

    /**
     * @param string $key
     * @return ResponseExample|null
     */
    public function get($key)
    {
        return array_key_exists($key, $this->items) ? $this->items[$key] : null;
    }

    /**
     * @return ResponseExample[]
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