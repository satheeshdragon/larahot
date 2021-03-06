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
        <div class="col-md-6"><h3>User View</h3></div>
        <div class="col-md-6">

        </div>
    </div>

    <br/>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('userupdation') }}" class="validate">
                        @csrf
                        <input type="hidden" name="master_id" value="{{ $user->id }}">

                        <div class="form-group row">
                            <label for="name"
                                   class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="user[fname]" value="{{ $user->fname }}"
                                       data-validate="required" data-message-required="Please Enter first name"
                                       autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="user[lname]" value="{{ $user->lname }}"
                                       data-validate="required" data-message-required="Please Enter last name"
                                       autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="user[email]" value="{{ $user->email }}" data-validate="required"
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
                                <input type="text" class="form-control" name="user[user_name]" value="{{ $user->user_name }}"
                                       data-validate="required" data-message-required="Please Enter User name"
                                       autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="user[phone]" value="{{ $user->phone }}"
                                       data-validate="required" data-message-required="Please Enter Phone Number"
                                       autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="user[address]" value="{{ $user->address }}"
                                       data-validate="required" data-message-required="Please Enter Address" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name"
                                   class="col-md-4 col-form-label text-md-right">{{ __('User Role') }}</label>
                            <div class="col-md-6">
                                <select class="form-control select2" name="user[role_id]" id="">
                                    @foreach ($users_roles as $row)
                                        <option value="{{ $row['role_id']  }}">{{ $row['role_name']  }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

{{--                        <div class="form-group row">--}}
{{--                            <label for="password"--}}
{{--                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}--}}
{{--                                <div class="label label-danger password_error" style="display: none">Password Not match</div>--}}
{{--                            </label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password" type="password"--}}
{{--                                       class="form-control @error('password') is-invalid @enderror" name="user[password]"--}}
{{--                                       required autocomplete="new-password">--}}

{{--                                @error('password')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="form-group row">--}}
{{--                            <label for="password-confirm"--}}
{{--                                   class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="password-confirm" type="password" class="form-control"--}}
{{--                                       name="password_confirmation" required autocomplete="new-password">--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{route('user')}}" class="btn btn-blue">
                                    {{ __('Back') }}
                                </a>
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


        $(function(){
            $('input').attr('disabled',true);
            $('select').attr('disabled',true);
            $(".select2").val([{{ $user->role_id }}]).trigger('change');
        })



    </script>


@endsection

