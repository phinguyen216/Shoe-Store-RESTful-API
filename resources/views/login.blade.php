<!DOCTYPE html>
<html>

<head>
    <title>Trang đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h3>Trang đăng nhập</h3>
        @if(session('message'))
           <p class="text-danger">{{ session('message') }} </p>
        @endif
        <form action="{{ route('postLogin') }}" method="post">
            @csrf
            <div class='mb3'>
                <label for="email">Email</label>
                <input type="email" class="form-control" placeholder="email" name ="email"> 
                <label for="email">Password</label>
                <input type="password" class="form-control" placeholder="password" name="password">
                <button class="btn-primary"> Đăng Nhập</button>
            </div>
        </form>
    </div>


</body>

</html>