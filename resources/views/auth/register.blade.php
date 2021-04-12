<?php

use Illuminate\Support\Facades\URL;

?>
@extends('layouts.app')
@section('title' , '註冊')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">註冊</div>
                    <div class="card-body">
                        {{Form::open([
                            'method' => 'POST',
                            'url' => 'register',
                        ])}}
                        @csrf
                        {{--姓名--}}
                        <div class="form-group row">
                            {{Form::label('' , '姓名' , [
                                'for' => 'name',
                                'class' => 'col-md-4 col-form-label text-md-right',
                            ])}}
                            <div class="col-md-6">
                                {{Form::text('name' , old('name') ,[
                                      'id' => 'name',
                                      'class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : null),
                                      'required' => 'required',
                                      'autofocus' => 'autofocus',
                                      'autocomplete' => 'name',
                                ])}}
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--Email(帳號)--}}
                        <div class="form-group row">
                            {{Form::label('' , 'Email(帳號)' , [
                                'for' => 'email',
                                'class' => 'col-md-4 col-form-label text-md-right',
                            ])}}
                            <div class="col-md-6">
                                {{Form::email('email' , old('email') ,[
                                    'id' => 'email',
                                    'class' => 'form-control'. ($errors->has('email') ? ' is-invalid' : null),
                                    'required' => 'required',
                                    'autocomplete' => 'email',
                                ])}}
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--密碼--}}
                        <div class="form-group row">
                            {{Form::label('','密碼',[
                                'for' => 'password',
                                'class' => 'col-md-4 col-form-label text-md-right',
                            ])}}
                            <div class="col-md-6">
                                {{Form::password('password' ,[
                                    'id' => 'password',
                                    'class' => 'form-control'. ($errors->has('password') ? ' is-invalid' : null),
                                    'required' => 'required',
                                    'autocomplete' => 'new-password',
                                ])}}
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--密碼確認--}}
                        <div class="form-group row">
                            {{Form::label('','密碼確認',[
                                'for' => 'password-confirm',
                                'class' => 'col-md-4 col-form-label text-md-right',
                            ])}}
                            <div class="col-md-6">
                                {{Form::password('password_confirmation' ,[
                                    'id' => 'password-confirm',
                                    'class' => 'form-control',
                                    'required' => 'required',
                                    'autocomplete' => 'new-password',
                                ])}}
                            </div>
                        </div>
                        {{--帳號類型--}}
                        <div class="form-group row">
                            {{Form::label('','帳號類型',[
                                'class' => 'col-md-4 col-form-label text-md-right',
                                'for' => 'account_type',
                            ])}}
                            <div class="col-md-6">
                                {{Form::select('account_type' , \App\Enum\AccountTypeEnum::getKeyValueMap() , \App\Enum\AccountTypeEnum::personal ,[
                                    'id' => 'account_type',
                                    'class' => 'form-control'. ($errors->has('account_type') ? ' is-invalid' : null),
                                    'required' => 'required',
                                ])}}
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        {{--todo群組邀請碼--}}
                        <div class="form-group row">
                            {{Form::label('','群組邀請碼',[
                                'for' => 'invite_code',
                                'class' => 'col-md-4 col-form-label text-md-right',
                            ])}}
                            <div class="col-md-6">
                                {{--todo 根據選項移除require屬性--}}
                                {{Form::text('invite_code' , old('invite_code') ,[
                                    'id' => 'invite_code',
                                    'class' => 'form-control'. ($errors->has('invite_code') ? ' is-invalid' : null),
                                    'required' => 'required',
                                    'autocomplete' => 'invite_code',
                                ])}}
                                <span class="personal-content">
                                    提供此邀請碼讓其他人加入群組
                                </span>
                                <span class="group-content">
                                    根據此邀請碼加入群組(也可以之後於帳號管理設定)<br>
                                </span>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        {{--群組名稱--}}
                        <div class="form-group row group-content">
                            {{Form::label('' , '群組名稱' , [
                                'for' => 'title',
                                'class' => 'col-md-4 col-form-label text-md-right',
                            ])}}
                            <div class="col-md-6">
                                {{Form::text('title' , old('title') ,[
                                      'id' => 'title',
                                      'class' => 'form-control'. ($errors->has('title') ? ' is-invalid' : null),
                                ])}}
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--群組簡介--}}
                        <div class="form-group row group-content">
                            {{Form::label('' , '群組簡介' , [
                                'for' => 'content',
                                'class' => 'col-md-4 col-form-label text-md-right',
                            ])}}
                            <div class="col-md-6">
                                {{Form::textarea('content' , old('content') ,[
                                      'id' => 'content',
                                      'class' => 'form-control'. ($errors->has('content') ? ' is-invalid' : null),
                                ])}}
                                @error('content')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--註冊(送出)--}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                {{Form::submit('註冊',[
                                    'class'=>'btn btn-primary'
                                ])}}
                            </div>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('style')
    <style>
        .nav-link[data-toggle].collapsed:after {
            content: " ▾";
        }

        .nav-link[data-toggle]:not(.collapsed):after {
            content: " ▴";
        }
    </style>
@endpush


@push('script')
    <script>
        $("#account_type").change(function () {
            changeAccountTypeContent();
        });

        $(function () {
            changeAccountTypeContent();
        });

        function changeAccountTypeContent() {
            let accountType = $('#account_type').val();
            let PersonalContentObj = $('.personal-content');
            let GroupContentObj = $('.group-content');
            switch (accountType) {
                case 'personal':
                    PersonalContentObj.show();
                    GroupContentObj.hide();
                    break;
                case 'group':
                    PersonalContentObj.hide();
                    GroupContentObj.show();
                    break;
            }
        }
    </script>
@endpush
