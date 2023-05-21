@props(['subheadline', 'headline', 'tag' => 'h2'])
<{{$tag}}>
    @if(isset($subheadline) && !empty($subheadline))
        <span {{ $subheadline->attributes->merge(['class' => 'PreHeadline d-block h6 hyphens-auto fw-bold text-uppercase mb-2 text-primary'])}}>{{ $subheadline }}</span>
    @endif
    @if(isset($headline) && !empty($headline))
        <span {{ $headline->attributes->merge(['class' => 'Headline d-block h6 hyphens-auto'])}}>{{ $headline }}</span>
    @endif
</{{$tag}}>
