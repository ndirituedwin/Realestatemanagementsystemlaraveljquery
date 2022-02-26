@extends('partials.default')
@section('content')
<div class="row">
    <div class="col-md-3">

    </div>
    <div class="col-md-7" >
        <div class="row ">
        </div>
        <div class="row" style="display:block" id="defaultpage">
            <div class="col-md-9 loginpage" >
                @include('partials.alerts')
                <h3 class="text-danger text-center" ><span style="font-family:Arial; color: black ">Propwings  login</span></h3><hr>

                <form action="{{ route('login')}}" role="form" method="POST" class="form-vertical">
                    @csrf
                            <div class="form-group">
                                <label for="" class="control-label"><h4>Login as..</h4></label>
                                <select  name="type" id="selecttype" class="form-control">
                                    <option value="">Select type</option>
                                   <option value="staff">Managing agent</option>
                                   <option value="salesagent">Sales agent</option>
                                   <option value="salesclient">Sales client</option>
                                   <option value="landlord">Landlord</option>
                                   <option value="tenant">Tenant</option>
                               </select>
                            </div>
                         <div class="form-group"  >
                             <center>
                                <img src="{{ asset('css1/matatu.jpg') }}" class="image" alt="">
                                </center>
                        </div>
                </form>
            </div>
        </div>
        <div class="row" style="display:none" id="staffloginblock">
            <div class="col-md-9 loginpage" >
                <h3 class="text-danger text-center" ><span style="font-family:Arail;color: black ">Propwings staff login</span></h3><hr>
                    <div class="container">
                        <div id="stafferrors" style="color: red">

                        </div>
                    </div>

                    <form action="{{ route('stafflogin')}}"  method="POST" class="form-vertical" id="staffform">
                        {{-- <form action="{{ route('staff')}}"  method="POST" class="form-vertical" id=""> --}}
                            @csrf
                     <div class="form-group">
                        <label for="username control-label"  >Username</label>
                        <input type="text" class="form-control inputfield" id="staffusername" name="staffusername" value="{{Request::old('staffusername')}}" placeholder="username">

                        <span class="text-danger error-text staffusername_error" ></span>
                     </div>
                   <div class="form-group">
                    <label for="password control-label">password</label>
                            <input type="password"  class="form-control inputfield" name="staffpassword" id="UserPwd" placeholder=" password" >

                            <span class="text-danger error-text staffpassword_error"   ></span>

                   </div>
                   <div  class="form-group">
                    <label for="organization control-label"> Organization</label>
                        <input type="text" class="form-control inputfield" id="stafforganization" name="stafforganization" value="{{(Request::old('stafforganization'))?Request::old('stafforganization'):''}}"  placeholder=" stafforganization">
                        <span class="text-danger error-text stafforganization_error"  ></span>

                   </div>
                 <div class="form-group">
                    <center>
                         <button type="submit"  value="Staff sign In"  class="btn btn-success login"  id="staffsignin">Staff sign in</button>
                         <a href="{{ route('login') }}" class="btn btn-info" >Go back</a>

                    </center>
                    </div>


                </form>
            </div>
        </div>
        {{-- sales agent --}}
        <div class="row" style="display:none" id="salesagentoginblock">
            <div class="col-md-9 loginpage" >
                <h3 class="text-danger text-center" ><span style="font-family:Arail;color: black ">Propwings sales agent login</span></h3><hr>
                    <div class="container">
                        <div id="stafferrors" style="color: red">

                        </div>
                    </div>

                    <form action="{{ route('salesagentlogin')}}"  method="POST" class="form-vertical" id="salesagentform">
                        {{-- <form action="{{ route('staff')}}"  method="POST" class="form-vertical" id=""> --}}
                            @csrf
                     <div class="form-group">
                        <label for="username control-label"  >Username</label>
                        <input type="text"    class="form-control inputfield" id="salesagentusername" name="salesagentusername" value="{{Request::old('salesagentusername')}}" placeholder="username">

                        <span class="text-danger error-text salesagentusername_error"></span>

                     </div>
                   <div class="form-group">
                    <label for="password control-label">password</label>
                        <input type="password"  class="form-control inputfield" name="salesagentpassword" id="UserPwd" placeholder=" password">

                    <span class="text-danger error-text salesagentpassword_error" ></span>

                   </div>
                   <div  class="form-group">
                    <label for="organization control-label"> Organization</label>
                        <input type="text"    class="form-control inputfield" id="salesagentorganization" name="salesagentorganization" value="{{(Request::old('salesagentorganization'))?Request::old('salesagentorganization'):''}}"  placeholder=" salesagentorganization">


                    <span class="text-danger error-text salesagentorganization_error"  ></span>

                   </div>
             <center>

                 <button type="submit"  value="Staff sign In"  class="btn btn-success login"  id="salesagentsignin">sales agent sign in</button>
                     <a href="{{ route('login') }}" class="btn btn-info">Go back</a>
             </center>


                </form>
            </div>
        </div>
        {{-- end --}}
          {{-- sales client --}}
          <div class="row" style="display:none" id="salesclientloginblock">
            <div class="col-md-9 loginpage" >
                <h3 class="text-danger text-center" ><span style="font-family:Arail;color: black ">Propwings sales client login</span></h3><hr>
                    <div class="container">
                        <div id="stafferrors" style="color: red">

                        </div>
                    </div>

                    <form action="{{ route('salesclientlogin')}}"  method="POST" class="form-vertical" id="salesclientform">
                        {{-- <form action="{{ route('staff')}}"  method="POST" class="form-vertical" id=""> --}}
                            @csrf
                     <div class="form-group">
                        <label for="clientno  control-label"  >Client No</label>
                      {{-- <center> --}}
                         <input type="text"    class="form-control inputfield" id="salesclientno" name="salesclientno" value="{{Request::old('salesclientno')}}" placeholder="client No">
                    {{-- </center> --}}
                        <span class="text-danger error-text salesclientno_error" ></span>

                     </div>
                   <div class="form-group">
                    <label for="password  control-label">password</label>
                        <input type="password"  class="form-control inputfield" name="salesclientpassword" id="UserPwd" placeholder=" password" >

                    <span class="text-danger error-text salesclientpassword_error"   ></span>

                   </div>
                   <div  class="form-group">
                    <label for="organization  control-label"> Organization</label>
                    <input type="text"    class="form-control inputfield" id="salesclientorganization" name="salesclientorganization" value="{{(Request::old('salesclientorganization'))?Request::old('salesclientorganization'):''}}"  placeholder=" salesclientorganization">

                    <span class="text-danger error-text salesclientorganization_error"   ></span>

                   </div>
                      <div class="form-group">
                          <center>


                           <button type="submit"    class="btn btn-success login" id="salesclientsignin">sales client sign in</button>
                               <a href="{{ route('login') }}" class="btn btn-info" >Go back</a>
                          </center>
                      </div>


                </form>
            </div>
        </div>
        {{-- end --}}
        {{--landlord login--}}

        <div class="row" style="display:none" id="landlordloginblock" >
            <div class="col-md-9 loginpage" >
                <h3 class="text-center" ><span style="font-family:Arial;color: black ">Propwings landlord login</span></h3><hr>

                <form action="{{ route('landordlogin')}}"  method="POST" class="form-vertical" id="landlordform">
                    @csrf

                    <div class="form-group{{$errors->has('landlordorganization')?' has-error ':''}}">
                        <label for="organization  control-label" >Organization</label>
                    <input type="text"    class="form-control inputfield" id="landlordorganization" name="landlordorganization" value="{{Request::old('landlordorganization')}}" placeholder="enter your organization">
                        @if ($errors->has('landlordorganization'))
                        <span class="help-block" id="span">{{$errors->first('landlordorganization')}}</span>
                        @endif
                        <span class="text-danger error-text landlordorganization_error"   ></span>
                      </div>
                     <div class="form-group{{$errors->has('useraccount')?' has-error ':''}}">
                        <label for="account  control-label" >User Account</label>
                        <input type="text"    class="form-control inputfield" id="useraccountcheck" name="useraccount" value="{{Request::old('useraccount')}}" placeholder="your user account(landlord code)">

                        <span class="text-danger error-text useraccount_error"   ></span>

                     </div>
                   <div class="form-group{{$errors->has('landlordpassword')?' has-error':''}}">
                    <label for="password  control-label">landlordPassword</label>
                        <input type="password"  class="form-control inputfield " name="landlordpassword" id="UserPwd" placeholder="password(id number)" >
                           <span class="text-danger error-text landlordpassword_error"   ></span>

                   </div>
                   <div class="form-group">
                            <center>

                                                        <button type="submit" id="landlordloginbtn" class="btn btn-success login"  >Landlord sign in</button>
                                                        <a href="{{ route('login') }}" class="btn btn-info">Go back</a>
                            </center>
                   </div>

                    </form>
            </div>
        </div>
        {{--end of landlord login--}}
        {{--tenant login--}}
           <div class="row" style="display:none" id="tenantloginblock" >
            <div class="col-md-9 loginpage" >
                <h3 class=" text-center" ><span style="font-family:Arial;color: black; ">Propwings tenant login</span></h3><hr>
                <form action="{{ route('tenantloginnnn')}}" role="form" method="POST" class="form-vertical" id="tenantformlogin">
                    @csrf
                    <div class="form-group">
                        <label for="organization  control-label" >Organization</label>
                        <input type="text"    class="form-control inputfield" id="tenant_organization" name="tenant_organization" value="{{Request::old('tenant_organization')}}" placeholder="enter your organization">
                        <span class="text-danger error-text tenant_organization_error"   ></span>
                     </div>
                    <div class="form-group">
                        <label for="account  control-label" >Account</label>
                        <input type="text"    class="form-control inputfield" id="t_codecheck" name="t_code" value="{{Request::old('t_code')}}" placeholder="enter yor tenant code">
                        <span class="text-danger error-text t_code_error"   ></span>
                     </div>
                   <div class="form-group{{$errors->has('idnumber')?' has-error':''}}">
                    <label for="password  control-label">Password</label>
                                     <input type="password"  class="form-control inputfield" name="idnumber" id="idnumber" placeholder=" enter yor id number" >

                    @if ($errors->has('idnumber'))
                    <span class="help-block " id="span">{{$errors->first('idnumber')}}</span>
                    @endif
                    <span class="text-danger error-text idnumber_error"   ></span>
                   </div>
                    <div class="form-group">
                        <center>

                            <button type="submit" id="tenantloginbtn" class="btn btn-success login"  >Tenant sign in</button>
                            <a href="{{ route('login') }}" class="btn btn-info" >Go back</a>
                        </center>
                    </div>

                </form>
            </div>
        </div>
        {{--end of tenant login--}}
    </div>




</div>
@endsection
