<?php
/**
 * User: evaisse
 * Date: 12/12/2016
 * Time: 10:38
 */
namespace OpenApi;

/**
 * Class Header
 * @package OpenApi
 */
class ItemObject implements \JsonSerializable
{
    /**
     * @var	string	Required. The type of the object. The value MUST be one of "string", "number", "integer", "boolean", or "array".
     */
    protected $type;
    /**
     * @var	string	The extending format for the previously mentioned type. See Data Type Formats for further details.
     */
    protected $format;
    /**
     * @var	Items Object	Required if type is "array". Describes the type of items in the array.
     */
    protected $items;
    /**
     * @var	string	Determines the format of the array if type array is used. Possible values are:
     *                 csv - comma separated values foo,bar.
     *                 ssv - space separated values foo bar.
     *                 tsv - tab separated values foo\tbar.
     *                 pipes - pipe separated values foo|bar.
     *              Default value is csv.
     */
    protected $collectionFormat = "csv";
    /**
     * @var	mixed Declares the value of the header that the server will use if none is provided. (Note: "default" has no meaning for required headers.) See http://json-schema.org/latest/json-schema-validation.html#anchor101. Unlike JSON Schema this value MUST conform to the defined type for the header.
     */
    protected $default;
    /**
     * @var	number	See http://json-schema.org/latest/json-schema-validation.html#anchor17.
     */
    protected $maximum;
    /**
     * @var	boolean	See http://json-schema.org/latest/json-schema-validation.html#anchor17.
     */
    protected $exclusiveMaximum;
    /**
     * @var	number	See http://json-schema.org/latest/json-schema-validation.html#anchor21.
     */
    protected $minimum;
    /**
     * @var	boolean	See http://json-schema.org/latest/json-schema-validation.html#anchor21.
     */
    protected $exclusiveMinimum;
    /**
     * @var	integer	See http://json-schema.org/latest/json-schema-validation.html#anchor26.
     */
    protected $maxLength;
    /**
     * @var	integer	See http://json-schema.org/latest/json-schema-validation.html#anchor29.
     */
    protected $minLength;
    /**
     * @var	string	See http://json-schema.org/latest/json-schema-validation.html#anchor33.
     */
    protected $pattern;
    /**
     * @var	integer	See http://json-schema.org/latest/json-schema-validation.html#anchor42.
     */
    protected $maxItems;
    /**
     * @var	integer	See http://json-schema.org/latest/json-schema-validation.html#anchor45.
     */
    protected $minItems;
    /**
     * @var	boolean	See http://json-schema.org/latest/json-schema-validation.html#anchor49.
     */
    protected $uniqueItems;
    /**
     * @var	mixed[]	See http://json-schema.org/latest/json-schema-validation.html#anchor76.
     */
    protected $enum;
    /**
     * @var	number	See http://json-schema.org/latest/json-schema-validation.html#anchor14.
     */
    protected $multipleOf;

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
     * @return number
     */
    public function getMultipleOf()
    {
        return $this->multipleOf;
    }

    /**
     * @param number $multipleOf
     * @return ItemObject
     */
    public function setMultipleOf($multipleOf)
    {
        $this->multipleOf = $multipleOf;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return ItemObject
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param string $format
     * @return ItemObject
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * @return Items
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Items $items
     * @return ItemObject
     */
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @return string
     */
    public function getCollectionFormat()
    {
        return $this->collectionFormat;
    }

    /**
     * @param string $collectionFormat
     * @return ItemObject
     */
    public function setCollectionFormat($collectionFormat)
    {
        $this->collectionFormat = $collectionFormat;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @param mixed $default
     * @return ItemObject
     */
    public function setDefault($default)
    {
        $this->default = $default;

        return $this;
    }

    /**
     * @return number
     */
    public function getMaximum()
    {
        return $this->maximum;
    }

    /**
     * @param number $maximum
     * @return ItemObject
     */
    public function setMaximum($maximum)
    {
        $this->maximum = $maximum;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isExclusiveMaximum()
    {
        return $this->exclusiveMaximum;
    }

    /**
     * @param boolean $exclusiveMaximum
     * @return ItemObject
     */
    public function setExclusiveMaximum($exclusiveMaximum)
    {
        $this->exclusiveMaximum = $exclusiveMaximum;

        return $this;
    }

    /**
     * @return number
     */
    public function getMinimum()
    {
        return $this->minimum;
    }

    /**
     * @param number $minimum
     * @return ItemObject
     */
    public function setMinimum($minimum)
    {
        $this->minimum = $minimum;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isExclusiveMinimum()
    {
        return $this->exclusiveMinimum;
    }

    /**
     * @param boolean $exclusiveMinimum
     * @return ItemObject
     */
    public function setExclusiveMinimum($exclusiveMinimum)
    {
        $this->exclusiveMinimum = $exclusiveMinimum;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxLength()
    {
        return $this->maxLength;
    }

    /**
     * @param int $maxLength
     * @return ItemObject
     */
    public function setMaxLength($maxLength)
    {
        $this->maxLength = $maxLength;

        return $this;
    }

    /**
     * @return int
     */
    public function getMinLength()
    {
        return $this->minLength;
    }

    /**
     * @param int $minLength
     * @return ItemObject
     */
    public function setMinLength($minLength)
    {
        $this->minLength = $minLength;

        return $this;
    }

    /**
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @param string $pattern
     * @return ItemObject
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;

        return $this;
    }

    /**
     * @return int
     */
    public function getMaxItems()
    {
        return $this->maxItems;
    }

    /**
     * @param int $maxItems
     * @return ItemObject
     */
    public function setMaxItems($maxItems)
    {
        $this->maxItems = $maxItems;

        return $this;
    }

    /**
     * @return int
     */
    public function getMinItems()
    {
        return $this->minItems;
    }

    /**
     * @param int $minItems
     * @return ItemObject
     */
    public function setMinItems($minItems)
    {
        $this->minItems = $minItems;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isUniqueItems()
    {
        return $this->uniqueItems;
    }

    /**
     * @param boolean $uniqueItems
     * @return ItemObject
     */
    public function setUniqueItems($uniqueItems)
    {
        $this->uniqueItems = $uniqueItems;

        return $this;
    }

    /**
     * @return \mixed[]
     */
    public function getEnum()
    {
        return $this->enum;
    }

    /**
     * @param \mixed[] $enum
     * @return ItemObject
     */
    public function setEnum($enum)
    {
        $this->enum = $enum;

        return $this;
    }



}