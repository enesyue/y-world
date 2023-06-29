@props(['attachment', 'headline', 'size' => 'thumbnail',
'attrs' => 'object-cover', 'caption' => null, 'ratio' => '16x9'])
<figure {{ $attributes->merge(['class' => 'm-0']) }}>
@if($ratio) <div class="w-full"> @endif
    {!! wp_get_attachment_image( $attachment, $size, false, ['class' => "aspect-$ratio $attrs"]) !!}
@if($ratio) </div> @endif
@if($caption && !empty($caption))
<figcaption
    class="text-muted text-end mt-1">
</figcaption>
@endif
</figure>
