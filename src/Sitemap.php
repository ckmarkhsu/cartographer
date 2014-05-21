<?php

namespace Tackk\Cartographer;

class ChangeFrequency
{
    const ALWAYS  = 'always';
    const HOURLY  = 'hourly';
    const DAILY   = 'daily';
    const WEEKLY  = 'weekly';
    const MONTHLY = 'monthly';
    const YEARLY  = 'yearly';
    const NEVER   = 'never';
}

class Sitemap extends AbstractSitemap
{
    public function __construct()
    {
        parent::__construct();
        $this->rootNode->setAttributeNS('http://www.w3.org/2000/xmlns/' ,'xmlns:xhtml', 'http://www.w3.org/1999/xhtml');
    }

    protected function getRootNodeName()
    {
        return 'urlset';
    }

    protected function getNodeName()
    {
        return 'url';
    }

    /**
     * Adds the URL to the urlset.
     * @param  string     $loc
     * @param  string|int $lastmod
     * @param  string     $changefreq
     * @param  float      $priority
     * @param  array      $hreflang
     * @return $this
     */
    public function add($loc, $lastmod = null, $changefreq = null, $priority = null, $hreflang = null)
    {
        $loc     = $this->escapeString($loc);
        $lastmod = !is_null($lastmod) ? $this->formatDate($lastmod) : null;

        return $this->addUrlToDocument(compact('loc', 'lastmod', 'changefreq', 'priority'), $hreflang);
    }
}
