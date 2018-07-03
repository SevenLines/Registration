<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($services as $service)
    <url>
        <loc>{{URL::to('/')}}/services/{{$service->alias}}</loc>
        <lastmod>{{$service->updated_at->format('Y-m-d')}}</lastmod>
        <changefreq>monthly</changefreq>
    </url>
    @endforeach
        @foreach($articles as $article)
            <url>
                <loc>{{URL::to('/')}}/articles/{{$article->id}}</loc>
                <lastmod>{{$article->updated_at->format('Y-m-d')}}</lastmod>
                <changefreq>monthly</changefreq>
            </url>
        @endforeach

</urlset>