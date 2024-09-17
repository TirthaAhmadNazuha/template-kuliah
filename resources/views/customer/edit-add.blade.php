@extends('layout.app')

@section('title', $data['title'] . (isset($item['_id']) ? ' Edit' : ' Tambah'))

@section('content')
@if (isset($item['_id']))
  <form action="{{ route($data['name_route'] . '.update', $item['_id']) }}" method="post">
    @method('PUT')
  @else
    <form action="{{ route($data['name_route'] . '.store') }}" method="post">
    @method('POST')
@endif
    @csrf
    @foreach ($data['fillable_types'] as $inp_type)
    <div>
      @if ($inp_type['type'] == 'textarea')
      <textarea name="{{$inp_type['name']}}" id=""
      placeholder="{{$inp_type['placeholder']}}">{{ $item[$inp_type['name']] ?? null }}</textarea>
    @else
      <input name="{{$inp_type['name']}}" placeholder="{{$inp_type['placeholder']}}" type="{{$inp_type['type']}}"
      value="{{ $item[$inp_type['name']] ?? null }}">
    @endif
    </div>
  @endforeach
    <div class="flex gap-3">
      <button type="reset" class="btn-outline">Reset</button>
      <button type="submit" class="btn-primary">{{ isset($item['_id']) ? 'Edit' : 'Tambah' }}</button>
    </div>
  </form>
  @endsection
