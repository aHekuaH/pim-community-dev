<?php

declare(strict_types=1);

namespace Akeneo\Platform\Bundle\UIBundle\Provider\ContentSecurityPolicy;

use Akeneo\Platform\Bundle\UIBundle\EventListener\ScriptNonceGenerator;

final class AkeneoContentSecurityPolicyProvider implements ContentSecurityPolicyProviderInterface
{
    private string $generatedNonce;

    public function __construct(ScriptNonceGenerator $nonceGenerator)
    {
        $this->generatedNonce = $nonceGenerator->getGeneratedNonce();
    }

    public function getContentSecurityPolicy(): array
    {
        return [
            'default-src' => ["'self'", "*.akeneo.com", "'unsafe-inline'"],
            'script-src' => ["'self'", "'unsafe-eval'", sprintf("'nonce-%s'", $this->generatedNonce)],
            'img-src' => ["'self'", "data:"],
            'frame-src' => ["*"],
            'font-src' => ["'self'", "data:"],
            'connect-src'=> ["'self'", "*.akeneo.com"],
        ];
    }
}
