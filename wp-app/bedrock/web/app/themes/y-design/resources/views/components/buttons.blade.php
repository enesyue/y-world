@props(['primaryButton', 'secondaryButton', 'buttonSize' => null, 'buttonTypes' => ['primary', 'secondary']])
@if(is_array($primaryButton))
  <x-button type="{{$buttonTypes[0]}}" class="{{$secondaryButton ? 'me-sm-3' : ''}} {{$buttonSize ? ''. $buttonSize .'' : ''}}" :href="$primaryButton['url']" :target="$primaryButton['target']">{!! $primaryButton['title'] !!}</x-button>
@endif
@if(is_array($secondaryButton))
  <x-button type="{{$buttonTypes[1]}}" class="{{$buttonSize ? ''. $buttonSize .'' : ''}}" :href="$secondaryButton['url']" :target="$secondaryButton['target']">{!! $secondaryButton['title'] !!}</x-button>
@endif
