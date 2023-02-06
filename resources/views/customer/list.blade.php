@extends('layouts.app')



@section('content')
    <p>Список пользователей книг:</p>

    <a href="{{ route('customerList') }}?customer_ids=1,2&year=5,6&author=Imani Gaylord">Пример ссылки с фильтрацией</a>

    <br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Ид</th>
            <th>Имя</th>
            <th>Пол</th>
            <th>Ссылка</th>
        </tr>
        </thead>
        <tbody id="myTable">
        @foreach($customers as $customer)
            <tr>
                <td>{{ $customer['id'] }}</td>
                <td>{{ $customer['name'] }}</td>
                <td>{{ $customer['gender'] }}</td>
                <td><a href="{{ $customer['url'] }}">Ссылка</a></td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
