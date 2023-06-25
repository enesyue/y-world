@php
    // Block Margin
    //$hasMargin = !empty(get_field('remove_margin')) ? '' : wp_cache_get('remove_margin');
    $hasMargin = (get_field('remove_margin') == 1  ? '' : 'block_margin');

    // Block Content
    $subheadline = get_field('subheadline');
    $headline = get_field('headline');
    $description = get_field('description');
    $primaryButton = get_field('primary_button');
    $secondaryButton = get_field('secondary_button');
    $image = get_field('image');

    // Block Layout
    $layout = get_field('layout');
    $order = get_field('order');
    $hasBackground = get_field('background');
@endphp

<div class="container mb-5">
    <a href="#" class="p-5 bg-blue-500 block">{!! $headline !!}</a>
</div>

<section class="text-media {{ $hasMargin }}">
    <div class="block__text-media container">
        <a href="#" class="p-5 bg-blue-500 block">{!! $headline !!}</a>
    </div>
</section>