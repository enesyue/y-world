@props(['tag' => 'a', 'type' => 'primary' ])
@php if (empty($attributes['target'])) { unset($attributes['target']); } @endphp
<{{ $tag }} {{ $attributes->merge(['class' => $type == 'textlink' ? ''. $type .'' : 'btn btn-'.$type ]) }}>
  {{ $slot }}
</{{ $tag }}>
