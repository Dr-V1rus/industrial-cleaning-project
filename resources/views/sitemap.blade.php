<?php header('Content-Type: text/xml'); ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <priority>1.0</priority>
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>{{ url('/about') }}</loc>
        <priority>0.8</priority>
        <changefreq>monthly</changefreq>
    </url>
    <url>
        <loc>{{ url('/allservices') }}</loc>
        <priority>0.9</priority>
        <changefreq>weekly</changefreq>
    </url>
    <url>
        <loc>{{ url('/contact') }}</loc>
        <priority>0.7</priority>
        <changefreq>monthly</changefreq>
    </url>
</urlset>