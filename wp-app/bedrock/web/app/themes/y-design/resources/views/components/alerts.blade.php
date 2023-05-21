<div {{ $attributes->merge(['class' => 'bg-blue-100']) }}>
  {!! $message ?? $slot !!}
</div>
