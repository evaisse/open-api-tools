<?php
/**
 * User: evaisse
 * Date: 08/12/2016
 * Time: 17:55
 */
namespace OpenApi;

/**
 * Class Parameter
 * @package OpenApi
 */
abstract class Parameter implements \JsonSerializable
{

    /**
     * @var string Required. The name of the parameter. Parameter names are case sensitive.
     *             If in is "path", the name field MUST correspond to the associated path segment from the path field in the Paths Object. See Path Templating for further information.
     *              For all other cases, the name corresponds to the parameter name used based on the in property.
     */
    protected $name;
    
    /**
     * @var string A brief description of the parameter. This could contain examples of use. GFM syntax can be used for rich text representation.
     */
    protected $description;

    /**
     * @var boolean Determines whether this parameter is mandatory. If the parameter is in "path", this property is required and its value MUST be true. Otherwise, the property MAY be included and its default value is false.
     */
    protected $required;

    /**
     * @param string $name
     * @param array  $params
     */
    public function __construct($name, array $params = [])
    {
        $this->name = $name;
        foreach ($params as $k => $v) {
            $this->{"set$k"}($v);
        }
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $props = [];
        foreach ($this as $k => $v) {
            if ($v !== null) {
                $props[$k] = $v;
            }
        }
        return $props;
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
     * @return Parameter
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * @return Parameter
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isRequired()
    {
        return $this->required;
    }

    /**
     * @param boolean $required
     * @return Parameter
     */
    public function setRequired($required)
    {
        $this->required = !!$required;

        return $this;
    }





}