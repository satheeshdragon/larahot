@extends('layouts.app')

@section('content')


    <ol class="breadcrumb bc-3">
        <li>
            <a href="#"><i class="fa-home"></i>Home</a>
        </li>
        <li>

            <a href="#">User Management</a>
        </li>
        <li class="active">

            <strong>Users</strong>
        </li>
    </ol>

    <div class="row">
        <div class="col-md-6"><h3>Create new User</h3></div>
        <div class="col-md-6">

        </div>
    </div>

    <br/>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('userstore') }}" class="validate">
                        @csrf

                        <div class="form-group row">
                            <label for="name"
                                   class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="user[fname]" value=""
                                       data-validate="required" data-message-required="Please Enter first name"
                                       autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="user[lname]" value=""
                                       data-validate="required" data-message-required="Please Enter last name"
                                       autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="user[email]" value="{{ old('email') }}" data-validate="required"
                                       data-message-required="Please Enter Email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name"
                                   class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="user[user_name]" value=""
                                       data-validate="required" data-message-required="Please Enter User name"
                                       autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="user[phone]" value=""
                                       data-validate="required" data-message-required="Please Enter Phone Number"
                                       autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="user[address]" value=""
                                       data-validate="required" data-message-required="Please Enter Address" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name"
                                   class="col-md-4 col-form-label text-md-right">{{ __('User Role') }}</label>
                            <div class="col-md-6">
                                <select class="form-control select2" name="user[role_id]" id="">
                                    @foreach ($users as $row)
                                        <option value="{{ $row['role_id']  }}">{{ $row['role_name']  }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}
                                <div class="label label-danger password_error" style="display: none">Password Not match</div>
                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="user[password]"
                                       required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Create User') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>


        $(document).on('change', '#password', function (e) {
            validator();
        });

        $(document).on('change', '#password-confirm', function (e) {
            validator();
        });

        function validator() {
            var password = $('#password').val();
            var conform_password = $('#password-confirm').val();

            if(password != '' && conform_password != ''){
                if(password != conform_password){
                    $('.password_error').show();
                    $('.btn-success').attr('disabled',true);
                }else{
                    $('.password_error').hide();
                    $('.btn-success').attr('disabled',false);
                }
            }
        }

    </script>


@endsection

