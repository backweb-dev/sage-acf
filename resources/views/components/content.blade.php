@if(get_sub_field('content') || get_field('content'))
  <div {!! $attributes !!}>
    {!! get_sub_field('content') ?: get_field('content') !!}
  </div>
@endif
