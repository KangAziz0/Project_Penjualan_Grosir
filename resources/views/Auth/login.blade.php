<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
    <title>Login</title>
</head>

<body>
    <!---------------------Main Container ---------------------->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">


        <!---------------------Login Container --------------------->
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <!----------------Left Box ----------------->
            <div class="col-md-6 d-flex rounded-5 justify-centent-center align-items-center  left-box" style="background-size: cover;">
                <div class="featured-image">
                    <img src="img/gmb1.png" class="img-fluid  rounded-5" alt="">
                </div>
                <!-- <p>Be Verified</p>
                <small>Join Experienced Designers on this platform</small> -->
            </div>
            <!----------------Right Box ----------------->
            <div class="col-md-6 right-box">
                <div class="row align-items-center mt-3">
                    <div class="header-text mb-4 d-flex justify-content-center">
                        <h3>Form Login</h3>
                    </div>
                    <form action="{{route('login-proses')}}" method="POST">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" name="user" value="{{Session::get('name')}}" class="form-control form-control-lg bg-light fs-6" placeholder="Username"  required>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password"  required>
                        </div>
                        <div class="input-group">
                            <button name="submit" type="submit" class="btn mt-3 rounded-4 w-100 fs-6" style="background-color: rgb(255,222, 204);">
                                Login
                            </button>
                            <button type="button" class="btn mt-3 w-100 fs-6">
                                <img src="img/gg.png" alt="" style="width: 30px" class="me-2"><small>Sign In With Goggle</small>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if($message = Session::get('failed'))
    <script>
        Swal.fire('{{$message}}', '', 'warning')
    </script>
    @endif
</body>

</html>