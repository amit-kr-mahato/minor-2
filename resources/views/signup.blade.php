@extends('layouts.app')

@section('content')
    <div class="modall " id="eexampleModal" tabindex="-1">
        <div class="modal-content mt-5 mb-5">
            <div class="modal-body">
                @if ($errors->any())
                    <script>
                        let errorMessages = '';
                        @foreach ($errors->all() as $error)
                            errorMessages += '• {{ $error }}<br>';
                        @endforeach

                        Swal.fire({
                            icon: 'error',
                            title: 'Please fix the following fields:',
                            html: errorMessages,
                            confirmButtonColor: '#d33'
                        });
                    </script>
                @elseif (session('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: '{{ session('success') }}',
                            confirmButtonColor: '#28a745'
                        });
                    </script>
                @endif

                <form action="{{ route('insert') }}" method="POST">
                    @csrf
                    <!----------------------- Main Container -------------------------->
                    <div class="container d-flex justify-content-center align-items-center">
                        <!----------------------- Login Container -------------------------->
                        <div class="row border rounded-5 p-3 bg-white shadow box-area">
                            <!--------------------------- Left Box ----------------------------->
                            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                                style="background: #103cbe;">
                                <div class="featured-image mb-3">
                                    <img src="https://cdn-icons-png.flaticon.com/512/5721/5721113.png" alt=""
                                        class="img-fluid" style="width: 250px;">
                                </div>

                                <small class="text-white text-wrap text-center"
                                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Join
                                    experienced on this platform.</small>
                            </div>
                            <!-------------------- ------ Right Box ---------------------------->

                            <div class="col-md-6 right-box">
                                <div class="row align-items-center">
                                    <div class="header-text mb-4">
                                        <h2>Sign up</h2>

                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" name="name"
                                            class="form-control form-control-lg bg-light fs-6" placeholder="User Name">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" name="email"
                                            class="form-control form-control-lg bg-light fs-6" placeholder="Email address">
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="password" name="password"
                                            class="form-control form-control-lg bg-light fs-6" placeholder="Password"
                                            id="myInput">

                                    </div>


                                    <div class="input-group mb-3">
                                        <button class="btn btn-lg btn-primary w-100 fs-6">Sign
                                            up</button>
                                    </div>

                                    <div class="row">
                                        <small>Already have an account? <a href="{{ route('sigin') }}" class="fs-5">Log
                                                in</a></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
