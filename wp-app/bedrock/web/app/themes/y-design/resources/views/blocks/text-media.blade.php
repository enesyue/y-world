@php
    // Block Margin
    //$hasMargin = !empty(get_field('remove_margin')) ? '' : wp_cache_get('remove_margin');
    $has_margin = (get_field('remove_margin') == 1  ? '' : 'block_margin');

    // Block Content
    $subheadline = get_field('subheadline');
    $headline = get_field('headline');
    $description = get_field('description');
    $primary_button = get_field('primary_button');
    $secondary_button = get_field('secondary_button');
    $image = get_field('image');

    // Block Layout
    $layout = get_field('layout');
    $order = get_field('order');
    $has_background = get_field('background');
@endphp

<div class="container mb-5">
    <a href="#" class="p-5 bg-blue-500 block">{!! $headline !!}</a>
</div>

<section class="text-media {{ $has_margin }}">
    <div class="block__text-media container">
        <a href="#" class="p-5 bg-blue-500 block">{!! $headline !!}</a>
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 md:col-span-6">
                <div class="block__text-media__content">
                    <div class="block__text-media__content__subheadline">
                        {!! $subheadline !!}
                    </div>
                    <div class="block__text-media__content__headline">
                        {!! $headline !!}
                    </div>
                    <div class="block__text-media__content__description">
                        {!! $description !!}
                    </div>
                    <div class="block__text-media__content__buttons">
                        @if($primary_button)
                            <a href="{{ $primary_button['url'] }}" class="btn btn-primary">{{ $primary_button['title'] }}</a>
                        @endif
                        @if($secondary_button)
                            <a href="{{ $secondary_button['url'] }}" class="btn btn-secondary">{{ $secondary_button['title'] }}</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-span-12 md:col-span-6">
                <div class="block__text-media__image">
                    <x-image :attachment="$image" size="full" ratio="16/9" :caption="App\get_attachment_copyright($image)" />
                </div>
            </div>
        </div>
    </div>
</section>