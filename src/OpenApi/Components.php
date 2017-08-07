<?php
/**
 * User: evaisse
 * Date: 12/09/2017
 * Time: 15:15
 */
namespace OpenApi;

/**
 * Class Components
 * @package OpenApi
 */
class Components implements \JsonSerializable
{

    /**
     * @var	SchemasCollection An object to hold reusable Schema Objects.
     */
    protected $schemas;

    /**
     * @var ResponsesCollection An object to hold reusable Response Objects.
     */
    protected $responses;

    /**
     * @var ParametersDefinitionsCollection
     */
    protected $parameters;

    /**
     * @var ExamplesCollection An object to hold reusable Example Objects.
     */
    protected $examples;

    /**
     * @var RequestBodiesCollection An object to hold reusable Request Body Objects.
     */
    protected $requestBodies;

    /**
     * @var HeadersCollection An object to hold reusable Header Objects.
     */
    protected $headers;

    /**
     * @var SecuritySchemesCollection An object to hold reusable Security Scheme Objects.
     */
    protected $securitySchemes;

    /**
     * @var LinksCollection An object to hold reusable Link Objects.
     */
    protected $links;

    /**
     * @var CallBacksCollection An object to hold reusable Callback Objects.
     */
    protected $callbacks;


    /**
     * Components constructor.
     */
    public function __construct()
    {
        $this->schemas = new SchemasCollection();
        $this->responses = new ResponsesCollection();
        $this->parameters = new ParametersDefinitionsCollection();
        $this->examples = new ExamplesCollection();
        $this->headers = new HeadersCollection();
        $this->requestBodies = new RequestBodiesCollection();
    }


    /**
     * @return ParametersDefinitionsCollection
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param ParametersDefinitionsCollection $parameters
     * @return Specification
     */
    public function setParameters(ParametersDefinitionsCollection $parameters)
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * @return HeadersCollection
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param HeadersCollection $headers
     * @return Components
     */
    public function setHeaders(HeadersCollection $headers)
    {
        $this->headers = $headers;

        return $this;
    }



    /**
     * @return ResponsesDefinitionsCollection
     */
    public function getResponses()
    {
        return $this->responses;
    }

    /**
     * @param ResponsesDefinitionsCollection $responses
     * @return Specification
     */
    public function setResponses(ResponsesDefinitionsCollection $responses)
    {
        $this->responses = $responses;

        return $this;
    }

    /**
     * @return SchemasCollection
     */
    public function getSchemas()
    {
        return $this->schemas;
    }

    /**
     * @param SchemasCollection $schemas
     * @return Components
     */
    public function setSchemas($schemas)
    {
        $this->schemas = $schemas;

        return $this;
    }

    /**
     * @return array
     */
    public function getExamples()
    {
        return $this->examples;
    }

    /**
     * @param array $examples
     * @return Components
     */
    public function setExamples($examples)
    {
        $this->examples = $examples;

        return $this;
    }

    /**
     * @return array
     */
    public function getRequestBodies()
    {
        return $this->requestBodies;
    }

    /**
     * @param array $requestBodies
     * @return Components
     */
    public function setRequestBodies($requestBodies)
    {
        $this->requestBodies = $requestBodies;

        return $this;
    }


    /**
     * @return array
     */
    public function getSecuritySchemes()
    {
        return $this->securitySchemes;
    }

    /**
     * @param array $securitySchemes
     * @return Components
     */
    public function setSecuritySchemes(array $securitySchemes)
    {
        $this->securitySchemes = $securitySchemes;

        return $this;
    }

    /**
     * @return Link[]|\string[]
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param Link[]|\string[] $links
     * @return Components
     */
    public function setLinks(array $links)
    {
        $this->links = $links;

        return $this;
    }

    /**
     * @return array
     */
    public function getCallbacks()
    {
        return $this->callbacks;
    }

    /**
     * @param array $callbacks
     * @return Components
     */
    public function setCallbacks(array $callbacks)
    {
        $this->callbacks = $callbacks;

        return $this;
    }

    /**
     * @return array
     */
    function jsonSerialize()
    {
        $r = [];
        foreach ($this as $k => $v) {
            if ($v !== null) {
                $r[$k] = $v;
            }
        }
        return $r;
    }


}