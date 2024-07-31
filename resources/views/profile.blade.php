<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('logout') }}" method="POST" >
        @csrf
        <button class="btn btn-primary" type="submit">Logout</button>
    </form>
    <div class="d-flex justify-content-center">
        <div class="d-inline-flex p-2">
            <form method="POST" action="{{ url('profile') }}" enctype="multipart/form-data">
                @csrf
                <h1>Profile</h1>
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar">

                    <input type="file" name="avatar" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Full Name</label>
                    <input type="text" name="fullname" value="{{ $user->fullname }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">User Name </label>
                    <input type="text" name="username" value="{{ $user->username }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email </label>
                    <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                </div>
                <button class="btn btn-success" type="submit">Update</button>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>
