@extends('partials.default')
@section('content')
<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-7">
        <div class="row">
            <h4 class="text-danger text-center" style="font-size: 40px">Login form</h4><hr>
            @include('partials.alerts')  

        </div>
        <div class="row">
            <div class="col-md-9" style="width: 500px">
                <form action="{{ route('login')}}" role="form" method="POST" class="form-vertical">
                    @csrf
                     <div class="form-group{{$errors->has('username')?' has-error':''}}">
                        <label for="label col-md-2 control-label" >Username</label>
                        <input type="text"  style="color: white; border-radius:10px;width:400px;background-color: black"  class="form-control" id="UserNamecheck" name="username" value="{{Request::old('UserName')}}" placeholder="Your UserName">
                        @if ($errors->has('username'))
                        <span class="help-block text-danger">{{$errors->first('username')}}</span> 
                        @endif    
                        <span id="checkconfirmusername" ></span>
     
                     </div>
                   <div class="form-group{{$errors->has('password')?' has-error':''}}">
                    <label for="label col-md-2 control-label">Password</label>
    
                    <input type="password"  class="form-control" name="password" id="UserPwd" placeholder="Your password" style="color: white;border-radius:10px;width:400px;background-color: black">
                    @if ($errors->has('password'))
                    <span class="help-block text-danger">{{$errors->first('password')}}</span>
                    @endif 
                    <span id="checkUserPwd"></span><br>
    
    
                   </div>
                   <div class="form-group{{$errors->has('orgainization')?' has-error':''}}">
                    <label for="label col-md-2 control-label">Orgainization</label>
    
                    <input type="text"  class="form-control" name="organization" id="organization" placeholder="Enter organization name" style="color: white;border-radius:10px;width:400px;background-color: black">
                    @if ($errors->has('organization'))
                    <span class="help-block text-danger">{{$errors->first('organization')}}</span>
                    @endif 
                    <span id="organization"></span><br>
    
                   </div>
                     <center>
                      
                        <button type="submit" id="loginclick" class="btn btn-success login" style="margin-bottom: 10px;width:100px" >Sign In</button>
    
                      
                </center>
    
                </form>
            </div>
        </div>
    </div>
    
   


</div>
@endsection