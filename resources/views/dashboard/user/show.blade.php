<<<<<<< HEAD
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($users as $user)
      <tr>
        <td>{{$user['id']}}</td>
        <td>{{$user['full_name']}}</td>
        <td>{{$user['email']}}</td>
        <td>{{$user['phone_number']}}</td>
        <td>{{$user['office']}}</td>
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </body>
</html>
=======
@extends('base')
@section('content')
    <!-- Main Section -->
    <section class="main-section">
        <!-- Add Your Content Inside -->
        <div class="content">
            <!-- Remove This Before You Start -->
            <h1>SmartwareHouse -  Table User</h1>
            @if(Session::has('alert-success'))
                <div class="alert alert-success">
                    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                </div>
            @endif
            <hr>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Role</th>
                </tr>
                </thead>
                <tbody>
                @php $no = 1; @endphp
                @foreach($data as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->full_name }}</td>
                        <td>{{ $datas->email }}</td>
                        <td>{{ $datas->phone_number }}</td>
                        <td>{{ $datas->role }}</td>
                        <td>
                            <form action="{{ route('dashboard.user.destroy', $datas->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="{{ route('dashboard.user.edit',$datas->id) }}" class=" btn btn-sm btn-primary">Edit</a>
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.content -->
    </section>
    <!-- /.main-section -->
@endsection
>>>>>>> 60aad49d563f58dce5caeab437fa9fb423bbe71e
