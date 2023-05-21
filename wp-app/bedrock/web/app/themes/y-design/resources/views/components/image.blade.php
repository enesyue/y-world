@props(['attachment'. 'headline', 'size' => 'thumbnail',
'attrs' => ['class' => 'object-cover img-fluid'], 'caption' => null, 'ratio' => '16x9'])
<figure {{ $attributes->merge(['class' => 'm-0']) }}>
@if($ratio) <div class="ratio ratio-{{ $ratio }}"> @endif
    {!! wp_get_attachment_image( $attachment, $size, false, $attrs) !!}
@if($ratio) </div> @endif
@if($caption && !empty($caption))
<figcaption
    class="text-muted text-end mt-1">
</figcaption>
@endif
</figure>
