<?php

/*
 * This file is part of the Scribe Mantle Bundle.
 *
 * (c) Scribe Inc. <source@scribe.software>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Scribe\MantleBundle\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Symfony\Component\Yaml\Yaml;

/**
 * Class YamlResponse.
 */
class YamlResponse extends SymfonyResponse implements ResponseInterface
{
    use ResponseTrait;

    /**
     * @var string
     */
    protected $data;

    /**
     * Construct the basic instance properties.
     *
     * @param array|null  $content              The response content {@see setFinalContent()}
     * @param int|null    $status               Status for this response.
     * @param array       $headers              Headers specific to this response.
     * @param array       $headersGlobal        The global headers configured.
     * @param array       $headersTypeSpecific  The type-specific headers configured.
     * @param string|null $charsetGlobal        The global charset configured.
     * @param string|null $charsetTypeSpecific  The type-specific charset configured.
     * @param float|null  $protocolGlobal       The global charset configured.
     * @param float|null  $protocolTypeSpecific The type-specific charset configured.
     *
     * @throws \InvalidArgumentException When the HTTP status code is not valid
     *
     * @api
     */
    public function __construct($content = null, $status = null, $headers = [],
                                $headersGlobal = [], $headersTypeSpecific = [],
                                $charsetGlobal = null, $charsetTypeSpecific = null,
                                $protocolGlobal = null, $protocolTypeSpecific = null)
    {
        parent::__construct(
            null,
            $this->getFinalStatus($status),
            $this->getFinalHeaders($headersGlobal, $headersTypeSpecific, $headers)
        );

        $this->setData($content);

        $this->setCharset($this->getFinalCharset($charsetGlobal, $charsetTypeSpecific));
        $this->setProtocolVersion($this->getFinalProtocol($protocolGlobal, $protocolTypeSpecific));
    }

    /**
     * @param array|object $content
     */
    public function setData($content)
    {
        $this->data = Yaml::dump($content, 2, 4, false, true);
        $this->update();
    }

    public function update()
    {
        $this->setFinalContent($this->data);
    }
}

/* EOF */
