@extends('layouts.app')

@section('content')

<div class="table-responsive-sm">
<div class="row">
    <div class="col-12">
        <a href=" {{route('admin.notfications.read.all')}} " class="btn btn-sm btn-success ">Marcar todas como lidas!</a>
        <hr>
    </div>
</div>
    <table class="table table-striped table-hover ">
        <thead class="thead-light">
            <tr>
                <th scope="col">Notificação</th>
                <th scope="col">Criado em</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($unreadNotificationsUser as $notify)
                <tr>
                    <td>{{$notify->data['message']}}</td>
                    <td>{{$notify->created_at->locale('pt')->diffForHumans()}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Button group">
                            <a class="btn btn-sm btn-warning " href=" {{route('admin.notfications.read', ['notification' => $notify->id])}} ">Marcar como lida</a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">
                        <div class="alert alert-warning">
                            Nenhuma notificação encontrada!
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection