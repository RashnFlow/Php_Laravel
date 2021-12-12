@extends('pattern')

@section('title') Отзывы @endsection

@section('main_content')
    <div class="container px-4">
        <div class="row gy-5">
            <h1 class="display-5 fw-bold text-white text-center">Форма отзыва</h1>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="/review/check">
                @csrf
                <input type="email" name="email" id="email" placeholder="Введите email" class="form-control"><br>
                <input type="text" name="subject" id="subject" placeholder="Введите отзыв" class="form-control"><br>
                <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Сообщение"></textarea><br>
                <button type="submit" class="btn btn-success">Отправить</button>
            </form>

            <h1>Отзывы</h1>
            @foreach($reviews as $review)
                <div class="alert alert-warning">
                    <h3>{{$review->subject}}</h3>
                    <b>{{$review->email}}</b>
                    <p>{{$review->message}}</p>
                </div>
            @endforeach
        </div>
    </div>

@endsection
