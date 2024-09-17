@extends('layout.app')

@section('title', $data['title'])

@section('content')
<div class="flex flex-nowrap gap-3 py-3">
    <input
        class="bg-gray-100 font-medium border border-slate-300 outline-slate-700 outline-offset-2 rounded-md px-4 py-2 placeholder:text-slate-400 placeholder:font-semibold"
        placeholder="Cari..." type="search" name="" search-table="table-item-test">
    <a class="btn-success ml-auto" href="{{ route($data['name_route'] . '.create')}}">Tambah
        {{ $data['title'] }}</a>
</div>
<div class="table-container">
    <table search-table-effect="table-item-test">
        <thead>
            <tr>
                @foreach ($data['columns'] as $name)
                    <td>{{$name}}</td>
                @endforeach
                <td class="text-center">Aksi</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    @foreach ($item as $i => $val)
                        @if ($i !== '_id')
                            <td>{{$val}}</td>
                        @endif
                    @endforeach
                    <td>
                        <div class="row-aksi">
                            <form class="inline-block w-fit"
                                action="{{ route($data['name_route'] . '.destroy', $item['_id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">Delete</button>
                            </form>
                            <a href="{{ route($data['name_route'] . '.edit', $item['_id']) }}" class="btn-info">Edit</a>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
