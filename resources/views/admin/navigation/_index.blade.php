@extends('admin.app')

@section('content')
    <a href="{{route('admin.navigation.add')}}" class="btn btn-success text-white mb-3">Добавить элемент</a>
    <div class="app-card app-card-orders-table shadow-sm mb-5">
        <div class="app-card-body">
            @isset($auctions)
                <div class="table-responsive">
                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                        <tr>
                            <th class="cell">#id</th>
                            <th class="cell">Код торгов</th>
                            <th class="cell">Статус</th>
                            <th class="cell">Регистр.</th>
                            <th class="cell"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($auctions as $auction)
                            <tr>
                                <td class="cell">{{$auction["id"]}}</td>
                                <td class="cell">{{$auction["code"]}}</td>
                                <td class="cell">{{$auction["status"]}}</td>
                                <td class="cell">{{$auction["created_at"]}}</td>
                                <td class="cell">
                                    <a href="{{route('admin.auction.view', ['id'=>$auction["id"]])}}" class="btn-sm btn-info">Просм.</a>
                                    <a href="{{route('admin.auction.update', ['id'=>$auction["id"]])}}" class="btn-sm btn-warning">Редакт.</a>
                                    <a href="{{route('admin.auction.delete', ['id'=>$auction["id"]])}}" class="btn-sm btn-danger">Удал.</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!--//table-responsive-->

                {{--{!! $auctions->links() !!}--}}
            @endisset
        </div><!--//app-card-body-->
    </div>
@endsection
