@extends('dashboard.master')

@section('body')
    <div class="row">

        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-header d-flex justify-content-between">

                        <h4 class="fw-bold">ALL USERS</h4>
                        <a href="{{route('user-view')}}" class="btn btn-dark">CREATE</a>
                </div>
                @if(session('success') )
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                @endif
            </div>
            <table class="table table-dark table-striped-columns">
                <thead>
                  <tr>
                    <th scope="col">SL NO</th>
                    <th scope="col">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($allUsers as $user)
                  <tr>
                  <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$user->name}}</td>
                    <td>
                      @foreach ($user->roles as $role)
                          {{ $role->name }}<br>
                      @endforeach
                  </td>
                  <td>
                    {{$user->created_at->diffForHumans()}}
                  </td>
                    <td>
                      <div class="d-flex ">
                        <a class="btn btn-success me-3" href="{{ route('edit-user',  ['id' => $user->id]) }}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="{{ route('delete-user', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger"> <i class="fa-solid fa-trash"></i></button>
                        </form>

                    </div>
                    </td>
                  </tr>
                  @endforeach
                 

                </tbody>
              </table>
        </div>
    </div>
@endsection
