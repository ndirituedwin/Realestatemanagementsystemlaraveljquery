@extends('partials.default')
@section('content')
<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-7" >
        <div class="row ">

        </div>
        <div class="row" style="display:block" id="defaultpage">
            <div class="col-md-9 loginpagee" >
                @include('partials.alerts')
                <h3 class="text-danger text-center" ><span style="font-family:Arial; color: black ">Propwings  login</span></h3><hr>

                <form action="{{ route('login')}}" role="form" method="POST" class="form-vertical">
                    @csrf
                         <div class="form-group" >
                             <label for="" class="control-label"><h4>Login as..</h4></label>
                             <select  name="type" id="selecttype" class="form-control">
                                 <option value="">Select type</option>
                                <option value="staff">Staff</option>
                                <option value="landlord">Landlord</option>
                                <option value="tenant">Tenant</option>
                            </select>
                         </div>
                         <div class="form-group" >
                             <center>
                        <img src="{{ asset('css1/matatu.jpg') }}" style="width: 300px" alt="">
                             </center>
                        </div>
                </form>
            </div>
        </div>
        <div class="row" style="display:none" id="staffloginblock">
            <div class="col-md-9 loginpagee" >
                {{-- @include('partials.alerts') --}}
                <h3 class="text-danger text-center" ><span style="font-family:Arail;color: black ">Propwings staff login</span></h3><hr>
                    <div class="container">
                        <div id="stafferrors" style="color: red">

                        </div>
                    </div>

                    <form action="{{ route('stafflogin')}}"  method="POST" class="form-vertical" id="staffform">
                        {{-- <form action="{{ route('staff')}}"  method="POST" class="form-vertical" id=""> --}}
                            @csrf
                     <div class="form-group">
                        <label for="label col-md-2 control-label" >Username</label>
                      <center>
                         <input type="text"  style="color: white; border-radius:10px;width:300px;background-color: black"  class="form-control" id="staffusername" name="staffusername" value="{{Request::old('staffusername')}}" placeholder="username">

                    </center>
                        <span class="text-danger error-text staffusername_error" style="margin-left: 40px;"></span>

                     </div>
                   <div class="form-group">
                    <label for="label col-md-2 control-label">password</label>
                        <center>
                        <input type="password"  class="form-control" name="staffpassword" id="UserPwd" placeholder=" password" style="color: white;border-radius:10px;width:300px;background-color: black">
                        </center>

                    <span class="text-danger error-text staffpassword_error" style="margin-left: 40px;"  ></span>

                   </div>
                   <div style="margin-top: -10px" class="form-group">
                    <label for="label col-md-2 control-label"> Organization</label>
                    <center>
                    <input type="text"  style="color: white; border-radius:10px;width:300px;background-color: black"  class="form-control" id="stafforganization" name="stafforganization" value="{{(Request::old('stafforganization'))?Request::old('stafforganization'):''}}"  placeholder=" stafforganization">

                    </center>

                    <span class="text-danger error-text stafforganization_error" style="margin-left: 40px;"  ></span>

                   </div>

                   <button type="submit"  value="Staff sign In"  class="btn btn-success login" style="margin-top: -10px; margin-bottom: 10px;width:auto;margin-left: 30%" id="staffsignin">Staff sign in</button>
                       <a href="{{ route('login') }}" class="btn btn-info" style="margin-top: -10px; margin-bottom: 10px;width:auto;">Go back</a>


                </form>
            </div>
        </div>
        {{--landlord login--}}

        <div class="row" style="display:none" id="landlordloginblock" >
            <div class="col-md-9 loginpagee" >
                {{-- @include('partials.alerts') --}}
                <h3 class="text-center" ><span style="font-family:Arial;color: black ">Propwings landlord login</span></h3><hr>

                <form action="{{ route('landordlogin')}}"  method="POST" class="form-vertical" id="landlordform">
                    @csrf

                    <div class="form-group{{$errors->has('landlordorganization')?' has-error ':''}}">
                        <label for="label col-md-2 control-label" >Organization</label>
                      <center>
                    <input type="text"  style="color: white; border-radius:10px;width:300px;background-color: black"  class="form-control" id="landlordorganization" name="landlordorganization" value="{{Request::old('landlordorganization')}}" placeholder="enter your organization">
                    </center>
                        @if ($errors->has('landlordorganization'))
                        <span class="help-block" id="span">{{$errors->first('landlordorganization')}}</span>
                        @endif
                        <span class="text-danger error-text landlordorganization_error" style="margin-left: 40px;"  ></span>
                      </div>
                     <div class="form-group{{$errors->has('useraccount')?' has-error ':''}}">
                        <label for="label col-md-2 control-label" >User Account</label>
                      <center>
                        <input type="text"  style="color: white; border-radius:10px;width:300px;background-color: black"  class="form-control" id="useraccountcheck" name="useraccount" value="{{Request::old('useraccount')}}" placeholder="your user account(landlord code)">
                    </center>

                        <span class="text-danger error-text useraccount_error" style="margin-left: 40px;"  ></span>

                     </div>
                   <div class="form-group{{$errors->has('landlordpassword')?' has-error':''}}">
                    <label for="label col-md-2 control-label">landlordPassword</label>
                        <center>
                        <input type="password"  class="form-control" name="landlordpassword" id="UserPwd" placeholder="password(id number)" style="color: white;border-radius:10px;width:300px;background-color: black">
                        </center>
                           <span class="text-danger error-text landlordpassword_error" style="margin-left: 40px;"  ></span>

                   </div>
                        <button type="submit" id="landlordloginbtn" class="btn btn-success login" style="margin-top: -10px; margin-bottom: 10px;width:130px;margin-left: 30%" >Landlord sign in</button>
                        <a href="{{ route('login') }}" class="btn btn-info" style="margin-top: -10px; margin-bottom: 10px;width:auto;">Go back</a>

                    </form>
            </div>
        </div>
        {{--end of landlord login--}}
        {{--tenant login--}}
           <div class="row" style="display:none" id="tenantloginblock" >
            <div class="col-md-9 loginpagee" >
                {{-- @include('partials.alerts') --}}
                <h3 class=" text-center" ><span style="font-family:Arial;color: black; ">Propwings tenant login</span></h3><hr>
                <form action="{{ route('tenantloginnnn')}}" role="form" method="POST" class="form-vertical" id="tenantformlogin">
                    @csrf
                    <div class="form-group">
                        <label for="label col-md-2 control-label" >Organization</label>
                      <center>
                        <input type="text"  style="color: white; border-radius:10px;width:300px;background-color: black"  class="form-control" id="tenant_organization" name="tenant_organization" value="{{Request::old('tenant_organization')}}" placeholder="enter your organization">
                    </center>
                        <span class="text-danger error-text tenant_organization_error" style="margin-left: 40px;"  ></span>
                     </div>
                    <div class="form-group">
                        <label for="label col-md-2 control-label" >Account</label>
                      <center>
                        <input type="text"  style="color: white; border-radius:10px;width:300px;background-color: black"  class="form-control" id="t_codecheck" name="t_code" value="{{Request::old('t_code')}}" placeholder="enter yor tenant code">
                    </center>
                        <span class="text-danger error-text t_code_error" style="margin-left: 40px;"  ></span>
                     </div>
                   <div class="form-group{{$errors->has('idnumber')?' has-error':''}}">
                    <label for="label col-md-2 control-label">Password</label>
                        <center>
                                     <input type="password"  class="form-control" name="idnumber" id="idnumber" placeholder=" enter yor id number" style="color: white;border-radius:10px;width:300px;background-color: black">

                        </center>
                    @if ($errors->has('idnumber'))
                    <span class="help-block " id="span">{{$errors->first('idnumber')}}</span>
                    @endif
                    <span class="text-danger error-text idnumber_error" style="margin-left: 40px;"  ></span>
                   </div>
                        <button type="submit" id="tenantloginbtn" class="btn btn-success login" style="margin-top: -10px; margin-bottom: 10px;width:auto;margin-left: 30%" >Tenant sign in</button>
                        <a href="{{ route('login') }}" class="btn btn-info" style="margin-top: -10px; margin-bottom: 10px;width:auto;">Go back</a>

                </form>
            </div>
        </div>
        {{--end of tenant login--}}
    </div>




</div>
@endsection
