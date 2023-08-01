@extends('dashboard.master')


@section('body')
    <div class="row">
        <div class="col-5 mx-auto">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('update-user',['id' => $user->id])}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Name</label>
                          <input type="text" class="form-control" name="name" value="{{$user->name}}" id="exampleInputEmail1" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" name="email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                        </div>
                       
                        <div class="mb-3 form-check px-0">
                            <label for="exampleInputPassword1" class="form-label">Select Your Role</label>
                            <select class="form-select" aria-label="Default select example" name="roles">
                                <option selected>Select Your Role</option>
                               @foreach ($role as $item)
                               <option value="{{$item->id}}"
                                @if (in_array($item->id,$data))
                                selected                                    
                                @endif
                                >{{$item->name}}</option>                            
                               @endforeach
                              </select>
                        </div>
                        <button type="submit" class="btn btn-primary">UPDATE USER</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
@endsection
