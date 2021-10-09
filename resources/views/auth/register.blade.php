@extends('basic.app')

@section('content')
    <section>
        <article class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form method="post" action="{{route('register')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputName1" class="form-label">Имя</label>
                        <input type="text" name="first_name" class="form-control" id="exampleInputName1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName2" class="form-label">Фамилия</label>
                        <input type="text" name="last_name" class="form-control" id="exampleInputName2">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-block btn-orange">Зарегистрироваться</button>
                </form>
            </div>
        </article>
    </section>
@endsection
