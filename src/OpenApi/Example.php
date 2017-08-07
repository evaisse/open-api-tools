<?php
/**
 * User: evaisse
 * Date: 12/09/2017
 * Time: 16:11
 */
namespace OpenApi;

/**
 * Class Example
 * @package OpenApi
 */
class Example implements \JsonSerializable
{

    /**
     * @var string Short description for the example.
     */
    protected $summary;

    /**
     * @var string Long description for the example. CommonMark syntax MAY be used for rich text representation.
     */
    protected $description;

    /**
     * @var mixed Any Embedded literal example. The value field and externalValue field are mutually exclusive.
     *            To represent examples of media types that cannot naturally represented in JSON or YAML, use a
     *            string value to contain the example, escaping where necessary.
     */
    protected $value;

    /**
     * @var string A URL that points to the literal example. This provides the capability to reference examples that
     *             cannot easily be included in JSON or YAML documents. The value field and externalValue field
     *             are mutually exclusive.
     */
    protected $externalValue;

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;
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
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getExternalValue()
    {
        return $this->externalValue;
    }

    /**
     * @param string $externalValue
     */
    public function setExternalValue($externalValue)
    {
        $this->externalValue = $externalValue;
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        $r = [];
        foreach ($this as $k => $v) {
            $r[$k] = $v;
        }
        return $r;
    }


}