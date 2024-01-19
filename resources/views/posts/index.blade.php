@php use Illuminate\Support\Facades\Auth; @endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ivan Sabat test task</title>
</head>
<body>

<div class="nav">
    @if (Route::has('login'))
        <div class="buttons">
            @auth
                <a href="{{ url('/profile') }}">{{ Auth::user()->name }}</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <br>
                    <h2>{{ $posts->first()->title }}</h2>
                    <p>
                        {{ $posts->first()->body }}
                    </p>
                    <hr>
                    <h4>Щоб залишити коментар, будь ласка, зареєструйтеся, або використайте тестовий акаунт:</h4>
                    <small><i>Логін: </i><b>test@example.com</b></small><br>
                    <small><i>Пароль: </i><b>test28</b></small><br><br>
                    <hr>
                    @include('posts.commentsDisplay', ['comments' => $posts->first()->comments, 'post_id' => $posts->first()->id])

                    @if (Auth::check())
                        <hr>
                        <h4>Додати новий коментар</h4>
                        <form method="post" action="{{ route('comments.store') }}">
                            @csrf
                            <div class="form-group">
                                <label>
                                    <textarea class="form-control" name="body"></textarea>
                                </label>
                                <input type="hidden" name="post_id" value="{{ $posts->first()->id }}">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" value="Прокоментувати">
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
