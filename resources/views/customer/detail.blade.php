@extends('layouts.app')

@section('content')
    <a href="{{ route('customerList') }}">Назад к списку</a>
    <p>Пользователь:</p>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Имя</th>
            <th>Пол</th>
        </tr>
        </thead>
        <tbody id="myTable">
        <tr>
            <td>{{ $customer['name'] }}</td>
            <td>{{ $customer['gender'] }}</td>
        </tr>
        </tbody>
    </table>
    @if (count($customer['books']) > 0)
        <p>Список книг пользователя:</p>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Книга</th>
                <th>Автор(-ы)</th>
            </tr>
            </thead>
            <tbody id="myTable">
            @foreach($customer['books'] as $book)
                <tr>
                    <td>{{ $book['name'] }}</td>
                    <td>{{ $book['authors'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

@endsection
