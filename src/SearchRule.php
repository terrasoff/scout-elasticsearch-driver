<?php

namespace ScoutElastic;

use ScoutElastic\Builders\SearchBuilder;

class SearchRule
{
    /**
     * @var SearchBuilder
     */
    protected $builder;

    /**
     * @var array
     */
    protected $payload = [];

    /**
     * @return bool
     */
    public function isApplicable()
    {
        return true;
    }

    /**
     * @return array|null
     */
    public function buildHighlightPayload()
    {
        return null;
    }

    /**
     * @return array
     */
    public function buildQueryPayload()
    {
        return [
            'must' => [
                'query_string' => [
                    'query' => $this->builder->query
                ]
            ]
        ];
    }

    /**
     * @return array
     */
    public function getPayload(): array
    {
        return $this->payload;
    }

    /**
     * @param SearchBuilder $builder
     * @return $this
     */
    public function setBuilder(SearchBuilder $builder)
    {
        $this->builder = $builder;

        return $this;
    }
}
