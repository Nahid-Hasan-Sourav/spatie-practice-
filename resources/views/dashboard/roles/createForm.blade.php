@extends('dashboard.master')


@section('body')
    <div class="row">
        <div class="col-7 mx-auto">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('role-store')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Name</label>
                          <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
                         <small class="d-block mt-3">
                        @error('name')
                            <small class="p-2 alert-danger">{{ $message }}</small>
                        @enderror
                         </small>
                        </div>
                        <div class="d-flex flex-row">

                            @foreach ($permission as $item)
                            <div class="form-check me-2">
                                <input class="form-check-input" name="permission[]" type="checkbox" value="{{ $item->id  }}" id="permission{{ $item->id }}">
                                <label class="form-check-label" for="permission{{ $item->id }}">
                                 {{$item->name}}
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
