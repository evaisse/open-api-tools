<?php

namespace OpenApi;

/**
 * User: evaisse
 * Date: 08/12/2016
 * Time: 17:22
 * @see https://github.com/OAI/OpenAPI-Specification/blob/master/versions/2.0.md#schemaObject
 */
class Specification
{
    /**
     * @var string	Required. Specifies the Swagger Specification version being used. It can be used by the Swagger UI and other clients to interpret the API listing. The value MUST be "2.0".
     */
    protected $swagger = "2.0";
    /**
     * @var MetaData Object	Required. Provides metadata about the API. The metadata can be used by the clients if needed.
     */
    protected $info;
    /**
     * @var string	The host (name or ip) serving the API. This MUST be the host only and does not include the scheme nor sub-paths. It MAY include a port. If the host is not included, the host serving the documentation is to be used (including the port). The host does not support path templating.
     */
    protected $host;
    /**
     * @var string	The base path on which the API is served, which is relative to the host. If it is not included, the API is served directly under the host. The value MUST start with a leading slash (/). The basePath does not support path templating.
     */
    protected $basePath;
    /**
     * @var string[]	The transfer protocol of the API. Values MUST be from the list: "http", "https", "ws", "wss". If the schemes is not included, the default scheme to be used is the one used to access the Swagger definition itself.
     */
    protected $schemes;
    /**
     * @var string[]	A list of MIME types the APIs can consume. This is global to all APIs but can be overridden on specific API calls. Value MUST be as described under Mime Types.
     */
    protected $consumes;
    /**
     * @var string[]	A list of MIME types the APIs can produce. This is global to all APIs but can be overridden on specific API calls. Value MUST be as described under Mime Types.
     */
    protected $produces;
    /**
     * @var PathsCollection Object	Required. The available paths and operations for the API.
     */
    protected $paths;
    /**
     * @var DefinitionsCollection Object	An object to hold data types produced and consumed by operations.
     */
    protected $definitions;
    /**
     * @var ParametersDefinitionsCollection An object to hold parameters that can be used across operations. This property does not define global parameters for all operations.
     */
    protected $parameters;
    /**
     * @var ResponsesDefinitionsCollection An object to hold responses that can be used across operations. This property does not define global responses for all operations.
     */
    protected $responses;
    /**
     * @var SecurityDefinitionsCollection Security scheme definitions that can be used across the specification.
     */
    protected $securityDefinitions;
    /**
     * @var SecurityRequirement[] A declaration of which security schemes are applied for the API as a whole. The list of values describes alternative security schemes that can be used (that is, there is a logical OR between the security requirements). Individual operations can override this definition.
     */
    protected $security;
    /**
     * @var Tag[] A list of tags used by the specification with additional metadata. The order of the tags can be used to reflect on their order by the parsing tools. Not all tags that are used by the Operation Object must be declared. The tags that are not declared may be organized randomly or based on the tools' logic. Each tag name in the list MUST be unique.
     */
    protected $tags;
    /**
     * @var ExternalDocumentation Additional external documentation.
     */
    protected $externalDocs;

    function __construct()
    {
        $this->consumes = new Items();
    }


    /**
     * @return string
     */
    public function getSwagger()
    {
        return $this->swagger;
    }

    /**
     * @param string $swagger
     */
    public function setSwagger($swagger)
    {
        $this->swagger = $swagger;
    }

    /**
     * @return MetaData
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param MetaData $info
     */
    public function setInfo(MetaData $info)
    {
        $this->info = $info;
    }

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return string
     */
    public function getBasePath()
    {
        return $this->basePath;
    }

    /**
     * @param string $basePath
     */
    public function setBasePath($basePath)
    {
        $this->basePath = $basePath;
    }

    /**
     * @return \string[]
     */
    public function getSchemes()
    {
        return $this->schemes;
    }

    /**
     * @param \string[] $schemes
     */
    public function setSchemes($schemes)
    {
        $this->schemes = $schemes;
    }

    /**
     * @return \string[]
     */
    public function getConsumes()
    {
        return $this->consumes;
    }

    /**
     * @param \string[] $consumes
     */
    public function setConsumes($consumes)
    {
        $this->consumes = $consumes;
    }

    /**
     * @return \string[]
     */
    public function getProduces()
    {
        return $this->produces;
    }

    /**
     * @param \string[] $produces
     */
    public function setProduces($produces)
    {
        $this->produces = $produces;
    }

    /**
     * @return PathsCollection
     */
    public function getPaths()
    {
        return $this->paths;
    }

    /**
     * @param PathsCollection $paths
     */
    public function setPaths(PathsCollection $paths)
    {
        $this->paths = $paths;
    }

    /**
     * @return DefinitionsCollection
     */
    public function getDefinitions()
    {
        return $this->definitions;
    }

    /**
     * @param DefinitionsCollection $definitions
     */
    public function setDefinitions(DefinitionsCollection $definitions)
    {
        $this->definitions = $definitions;
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
     */
    public function setParameters(ParametersDefinitionsCollection $parameters)
    {
        $this->parameters = $parameters;
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
     */
    public function setResponses(ResponsesDefinitionsCollection $responses)
    {
        $this->responses = $responses;
    }

    /**
     * @return SecurityDefinitionsCollection
     */
    public function getSecurityDefinitions()
    {
        return $this->securityDefinitions;
    }

    /**
     * @param SecurityDefinitionsCollection $securityDefinitions
     */
    public function setSecurityDefinitions(SecurityDefinitionsCollection $securityDefinitions)
    {
        $this->securityDefinitions = $securityDefinitions;
    }

    /**
     * @return Items|SecurityRequirement[]
     */
    public function getSecurity()
    {
        return $this->security;
    }

    /**
     * @param Items|SecurityRequirement[] $security
     */
    public function setSecurity(Items $security)
    {
        $this->security = $security;
    }

    /**
     * @return Tag[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param Tag[] $tags
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
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
     */
    public function setExternalDocs(ExternalDocumentation $externalDocs)
    {
        $this->externalDocs = $externalDocs;
    }



}

