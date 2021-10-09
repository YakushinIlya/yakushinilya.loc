@extends('basic.app')

@section('content')
    <section>
        <article class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form method="post" action="{{route('login')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-block btn-orange">Войти</button>
                </form>
            </div>
        </article>
    </section>
@endsection
