@push('css')
<style>
    .profileImg{
        margin-left:10px;
        width:100px;
        height:100px;
        object-fit:cover;
        border-radius:12px;
    }
</style>
@endpush

@extends('layouts.theme.default')
@section('title', 'Settings | Gainify')
@section('content')

<ul class="nav nav-tabs" id="myTab" role="tablist" style="border-bottom-color:#35515F;">
    <hr>
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Settings</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Password</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">2FA</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#offers" type="button" role="tab" aria-controls="offers" aria-selected="false">History</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      
    <form action="{{ route('user.profile.setting.update') }}" id="profile-settings-form" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="bg-white p-2" style="border-radius: 10px;">
    
   
        <img src=
            class="img" alt="">
        <div class="pl-sm-4 pl-2" id="img-section" style="margin-top:15px;">
           
          
            <button class="btn btn-primary mr-3" style="margin-left: 20px;font-size:14px;box-shadow:none;"><b>Upload</b></button>
            @if (userProfile()['image'])
            @if(!empty(userInfo()->google_id))
             <img src="{{ userProfile()['image']}}" class="profileImg" alt="a" />
            @else
            <img src="{{ getImage(imagePath()['users']['path'] . '/' . userProfile()['image']) }}"
                 class="profileImg" alt="b" />
            @endif
        @else
            <img src="{{ asset('asset/images/users/default.png') }}" class="profileImg" alt="c" />
           
        @endif
        
    <!--</div>-->
     @if(empty(userInfo()->google_id))
        <input type="file" class="form-control" name="image" />
      
    @endif
           
        
    </div>
    <div class="py-2">
        <div class="row py-2">
            <div class="col-md-6">
                <label for="username">Username</label>
                <x-bs::input type="text" name="username" value="{{ userInfo()->username }}" />
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="firstname" >First Name</label>
                <x-bs::input type="text" name="firstname" value="{{ userInfo()->firstname }}" />
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="lastname" >Last Name</label>
                <x-bs::input type="text" name="lastname" value="{{ userInfo()->lastname }}" />
            </div>
            <div class="col-md-6">
                <label for="phone" >Mobile Number</label>
                <x-bs::input type="text" name="mobile" value="{{ userInfo()->mobile }}" />
            </div>
        </div>
        <div class="row py-2">
            <div class="col-md-6">
                <label for="address" >Address 1</label>
                <x-bs::input type="text" name="address[address1]" value="{{ @userAddress()['address1'] }}" />
            </div>
             <div class="col-md-6 ">
                <label for="zip" >ZIP</label>
                <x-bs::input type="text" name="address[zip]" value="{{ @userAddress()['zip'] }}" />
            </div>
        </div>
        
        <div class="row py-2">
            <div class="col-md-6">
                <label for="city" >City</label>
                <x-bs::input type="text" name="address[city]" value="{{ @userAddress()['city'] }}" />
            </div>
            <div class="col-md-6 pt-md-0 pt-3">
                <label for="state">State</label>
                <x-bs::input type="text" name="address[state]" value="{{ @userAddress()['state'] }}" />
            </div>
        </div>
        
        <div class="row py-2">
            <div class="col-md-6">
                <label for="country"  style="margin-bottom:8px;">Country</label>
                <select name="country" id="country" class="bg-light">
                <option value="" style="margin-bottom:15px;">Select One</option>
                                        @foreach (getCountries() as $country)
                                            <option value="{{ $country }}"
                                                @if ($country == @userAddress()['country']) selected @endif>{{ $country }}
                                            </option>
                                        @endforeach
                </select>
            </div>
            
        </div>
        <x-bs::button type="submit" class="my-2 custom-profile-setting-btn" :label="__('Update')" icon="share" style="box-shadow: none;font-size:14px;"  />
                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#deleteModal" style="letter-spacing: 1px;font-size:14px;background:#e84b3c;border-color:#e84b3c;box-shadow: none;" class="btn btn-danger">  <i><img src="{{ asset('asset/img/bin.svg') }}"></i> Delete Account</a>
                <a href="#" onclick="event.preventDefault(); $('form#logout-form').submit();"  style="letter-spacing: 1px;font-size:14px;background:#e84b3c;border-color:#e84b3c;box-shadow: none;" class="btn btn-danger">  <i class="fa-solid fa-right-from-bracket"></i> Logout</a>
            </div>
        </div>
    </form>
    
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      @include('user.password')
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
       @include('user.twofactor')
  </div>
  <div class="tab-pane fade" id="offers" role="tabpanel" aria-labelledby="offers-tab">
      <div id="user_reports"></div>
  </div>
</div>




    
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" data-bs-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg-dark  p-4">
                <h5 class="text-center" style="font-size:22px;box-shadow:none;">@lang('Delete Account')</h5>
                <form action="{{route('user.account.delete')}}" method="post">
                   @csrf
                    <div class="modal-body">
                       <p class="text-center" style="font-size:14px;">Your account and all data will be deleted permanently and this action cannot be undo.</p> 
                    </div>
                    <div class="modal-footer  justify-content-center border-0">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="background:#3B4740;border-color:#3B4740;box-shadow:none;">@lang('Cancel')</button>
                        <button type="submit" class="btn btn-primary" style="font-size:14px;background:#e84b3c;border-color:#e84b3c;box-shadow:none;" >@lang('Delete')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        </div>
    </div>
</div>

<style>
   @import url('https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@100;200;300;400;500;600;700;800;900&family=Rubik:wght@300;400;500;600;700;800;900&display=swap');

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    font-family: "Rubik", sans-serif, arial;
    background-color: #1F2F37;
    letter-spacing: 3px;
    
}

.wrapper{
    padding: 30px 50px;
    border: 1px solid #6FB99F;
    border-radius: 15px;
    margin: 10px auto;
    max-width: 600px;
    
}

ul#myTab {
    background: #35515F;
    font-size: 14px;
    font-weight: 400;
    margin-bottom:15px;
    border-radius:10px;
}

@media screen and (max-width: 425px) {
  ul#myTab {
    font-size:12px;
  }
}

li.nav-item button {
    color: #fff;
    font-weight: 600;
    padding: 18px 20px;
}
.nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #ffffff;
    background-color: #6FB99F;
    border-color: #6FB99F #6FB99F #fff;
}
.nav-link:focus, .nav-link:hover {
    color: #ffffff;
}
.nav-tabs .nav-link {
    margin-bottom: -1px;
    background: 0 0;
    border: none;
    border-radius:10px;
}
h4{
    letter-spacing: -1px;
    font-weight: 400;
}
.img{
    width: 70px;
    height: 70px;
    border-radius: 6px;
    object-fit: cover;
}
#img-section p,#deactivate p{
    font-size: 12px;
    color: #fff;
    margin-bottom: 10px;
    text-align: justify;
}
#img-section b,#img-section button,#deactivate b{
    font-size: 14px; 
}

label{
    margin-bottom: 0;
    font-size: 11px;
    font-weight: 500;
    color: #fff;
    padding-left: 3px;
}

.form-control{
    border-radius: 10px !important;
}

input[placeholder]{
    font-weight: 500;
}
.form-control:focus{
    box-shadow: none;
    border: 1.5px solid #6FB99F;
    color: #fff !important;
    font-size: 14px;
}
select{
    display: block;
    width: 100%;
    border: 1px solid #6FB99F;
    border-radius: 10px;
    height: 40px;
    padding: 5px 10px;
    color: #fff;
    /* -webkit-appearance: none; */
}

select:focus{
    outline: none;
}
.button{
    background-color: #fff;
    color: #fff;
}

.btn-primary{
    background-color: #0779e4;
}
.danger{
    background-color: #e20404;
    color: #fff;
    
    
}
.danger:hover{
    background-color: #e20404;
    color: #fff;
}
@media(max-width:576px){
    .wrapper{
        padding: 25px 20px;
    }
    #deactivate{
        line-height: 18px;
    }
}

input[type=file]::file-selector-button {
  margin-right: 20px;
  border: none;
  background: #6FB99F;
  padding: 10px 20px;
  border-radius: 10px;
  color: #fff;
  cursor: pointer;
  
}

input[type=file]::file-selector-button:hover {
  background: #6FB99F !important;
}

</style>
    
    
@endsection
@section('checkbox', true)
@section('datatabe', true)
@push('script')
<script>
    $(document).ready(function(){
        $.ajax({
            url:"{{ route('user.offer.reports') }}",
            type:"GET",
            success:function(res){
                $('#user_reports').html(res);
            }
        })
    })
</script>
@endpush
