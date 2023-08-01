@extends('dashboard.master')


@section('body')
    <div class="row">
        <div class="col-5 mx-auto">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('user-store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Name</label>
                          <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3 form-check px-0">
                            <label for="exampleInputPassword1" class="form-label">Select Your Role</label>
                            <select class="form-select" aria-label="Default select example" name="roles">
                                <option selected>Select Your Role</option>
                               @foreach ($role as $item)
                               <option value="{{$item->id}}">{{$item->name}}</option>                            
                               @endforeach
                              </select>
                        </div>
                        <button type="submit" class="btn btn-primary">ADD USER</button>
                      </form>
                </div>
            </div>
        </div>
    </div>
@endsection
