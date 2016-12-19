<?php
/**
 * User: evaisse
 * Date: 08/12/2016
 * Time: 17:55
 */
namespace OpenApi;


/**
 * Class Operation
 * @package OpenApi
 */
class Operation implements \JsonSerializable
{


    /**
     * @var array
     */
    public static $verbs = ['get', 'post', 'put', 'delete', 'head', 'options', 'patch'];

    /**
     * @var string Http method lowercase, get, post, put, ...
     */
    protected $method;

    /**
     * @var string[]|ArrayList A list of tags for API documentation control. Tags can be used for logical grouping of operations by resources or any other qualifier.
     */
    protected $tags;

    /**
     * @var string A short summary of what the operation does. For maximum readability in the swagger-ui, this field SHOULD be less than 120 characters.
     */
    protected $summary;

    /**
     * @var string A verbose explanation of the operation behavior. GFM syntax can be used for rich text representation.
     */
    protected $description;

    /**
     * @var ExternalDocumentation Additional external documentation for this operation.
     */
    protected $externalDocs;

    /**
     * @var string Unique string used to identify the operation. The id MUST be unique among all operations described in the API. Tools and libraries MAY use the operationId to uniquely identify an operation, therefore, it is recommended to follow common programming naming conventions.
     */
    protected $operationId;

    /**
     * @var string[]|ArrayList A list of MIME types the operation can consume. This overrides the consumes definition at the Swagger Object. An empty value MAY be used to clear the global definition. Value MUST be as described under Mime Types.
     */
    protected $consumes;

    /**
     * @var string[]|ArrayList A list of MIME types the operation can produce. This overrides the produces definition at the Swagger Object. An empty value MAY be used to clear the global definition. Value MUST be as described under Mime Types.
     */
    protected $produces;

    /**
     * @var Parameter[]|Reference[]|ArrayList A list of parameters that are applicable for this operation. If a parameter is already defined at the Path Item, the new definition will override it, but can never remove it. The list MUST NOT include duplicated parameters. A unique parameter is defined by a combination of a name and location. The list can use the Reference Object to link to parameters that are defined at the Swagger Object's parameters. There can be one "body" parameter at most.
     */
    protected $parameters;

    /**
     * @var ResponsesCollection Required. The list of possible responses as they are returned from executing this operation.
     */
    protected $responses;

    /**
     * @var string[]|ArrayList The transfer protocol for the operation. Values MUST be from the list: "http", "https", "ws", "wss". The value overrides the Swagger Object schemes definition.
     */
    protected $schemes;

    /**
     * @var boolean Declares this operation to be deprecated. Usage of the declared operation should be refrained. Default value is false.
     */
    protected $deprecated;

    /**
     * @var SecurityRequirement[]|ArrayList A declaration of which security schemes are applied for this operation. The list of values describes alternative security schemes that can be used (that is, there is a logical OR between the security requirements). This definition overrides any declared top-level security. To remove a top-level security declaration, an empty array can be used.
     */
    protected $security;

    /**
     * @param string $method
     */
    function __construct($method = null)
    {
        $method = strtolower($method);
        if (!in_array($method, self::$verbs, true)) {
            throw new \InvalidArgumentException('Invalid http method. use one of ' . join('/', self::$verbs));
        }
        $this->method = strtolower($method);
        $this->parameters = new ArrayList([], function ($item) {
            return $item instanceof Parameter;
        });
        $this->responses = new ResponsesCollection();
    }

    /**
     * @return ArrayList|SecurityRequirement[]
     */
    public function getSecurity()
    {
        return $this->security;
    }

    /**
     * @param ArrayList|SecurityRequirement[] $security
     * @return Operation
     */
    public function setSecurity(ArrayList $security)
    {
        $this->security = $security;

        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return \string[]|ArrayList
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param \string[]|ArrayList $tags
     * @return Operation
     */
    public function setTags(ArrayList $tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * @param string $summary
     * @return Operation
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

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
     * @return Operation
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return ExternalDocumentation
     */
    public function getExternalDocs()
    {
        return $this->externalDocs;
    }

    /**
     * @param ExternalDocumentation $externalDocs
     * @return Operation
     */
    public function setExternalDocs($externalDocs)
    {
        $this->externalDocs = $externalDocs;

        return $this;
    }

    /**
     * @return string
     */
    public function getOperationId()
    {
        return $this->operationId;
    }

    /**
     * @param string $operationId
     * @return Operation
     */
    public function setOperationId($operationId)
    {
        $this->operationId = $operationId;

        return $this;
    }

    /**
     * @return \string[]|ArrayList
     */
    public function getConsumes()
    {
        return $this->consumes;
    }

    /**
     * @param \string[]|ArrayList $consumes
     * @return Operation
     */
    public function setConsumes(ArrayList $consumes)
    {
        $this->consumes = $consumes;

        return $this;
    }

    /**
     * @return \string[]|ArrayList
     */
    public function getProduces()
    {
        return $this->produces;
    }

    /**
     * @param \string[]|ArrayList $produces
     * @return Operation
     */
    public function setProduces(ArrayList $produces)
    {
        $this->produces = $produces;

        return $this;
    }

    /**
     * @return ArrayList|Parameter[]|Reference[]
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param ArrayList|Parameter[]|Reference[] $parameters
     * @return Operation
     */
    public function setParameters($parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * @return ResponsesCollection
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * @param ResponsesCollection $responses
     * @return Operation
     */
    public function setResponses(ResponsesCollection $responses)
    {
        $this->responses = $responses;

        return $this;
    }

    /**
     * @return \string[]|ArrayList
     */
    public function getSchemes()
    {
        return $this->schemes;
    }

    /**
     * @param \string[]|ArrayList $schemes
     * @return Operation
     */
    public function setSchemes(ArrayList $schemes)
    {
        $this->schemes = $schemes;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isDeprecated()
    {
        return $this->deprecated;
    }

    /**
     * @param boolean $deprecated
     * @return Operation
     */
    public function setDeprecated($deprecated)
    {
        $this->deprecated = !!$deprecated;
        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $props = [];
        foreach ($this as $k => $v) {
            if ($v === null) {
                continue;
            }
            $props[$k] = $v;
        }
        unset($props['method']);
        return $props;
    }

}