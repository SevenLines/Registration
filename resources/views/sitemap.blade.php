<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>

<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach($services as $service)
    <sitemap>
        <loc>{{URL::to('/')}}/articles/{{$service->id}}</loc>
{{--        <lastmod>{{ $post->publishes_at->tz('UTC')->toAtomString() }}</lastmod>--}}
    </sitemap>
    @endforeach

</sitemapindex>