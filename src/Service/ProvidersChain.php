<?php

namespace App\Service;

class ProvidersChain
{
    private array $providers;

    public function __construct()
    {
        $this->providers = [];
    }

    public function addProvider(ProviderInterface $provider): void
    {
        $this->providers[] = $provider;
    }

    public function getProviders(): array
    {
       return $this->providers;
    }
}