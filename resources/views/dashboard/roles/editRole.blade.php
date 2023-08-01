@extends('dashboard.master')


@section('body')
    <div class="row">
        <div class="col-7 mx-auto">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('role-update',['id'=>$role->id])}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Name</label>
                          <input type="text" class="form-control" value={{ $role->name }} name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                          @error('name')
                          <small class="p-2 alert-danger">{{ $message }}</small>
                         @enderror
                        </div>
                        <label for="exampleInputEmail1" class="form-label">All Permission</label>
                        <div class="d-flex flex-row">

                            @foreach ($permissions as $permission)
                            <div class="form-check me-2">
                                <input class="form-check-input" type="checkbox" value="{{$permission->id}}" name="permissions[]" id="flexCheckDefault{{$permission->id}}"
                                @if(in_array($permission->id, $role->permissions->pluck('id')->toArray())) checked @endif
                                >
                                <label class="form-check-label" for="flexCheckDefault">
                                 {{$permission->name}}
                                </label>
                            </div>
                            @endforeach


                        </div>
                        <button type="submit" class="btn btn-primary">CREATE</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
@endsection
