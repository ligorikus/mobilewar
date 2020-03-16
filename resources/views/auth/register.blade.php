@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('auth.sign_up')}}</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{trans('auth.login')}}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{{trans('auth.password')}}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">{{trans('auth.gender')}}</label>

                            <div class="col-md-6">
                                <select name="gender" class="form-control" required>
                                    <option value="">{{trans('auth.gender_type.none')}}</option>
                                    <option value="0">{{trans('auth.gender_type.man')}}</option>
                                    <option value="1">{{trans('auth.gender_type.woman')}}</option>
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('nation') ? ' has-error' : '' }}">
                            <label for="nation" class="col-md-4 control-label">{{trans('auth.nation')}}</label>

                            <div class="col-md-6">
                                @php
                                $nations = \App\Model\Nation::all();
                                @endphp
                                <select name="nation" class="form-control" required>
                                    <option value="">{{trans('auth.nation_type.none')}}</option>
                                    @foreach($nations as $nation)
                                        <option value="{{$nation->id}}">{{trans('auth.nation_type.'.$nation->name)}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('nation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{trans('auth.sign_up_action')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
