
@extends('frontend.layouts.app')

@section('title', 'Apply for Position')

@section('content')

    
    <section class="log_in_area my-4">
      <div class="login_frm_container">
        <h2 class="login_frm_title">What's your phone number or email?</h2>
        <input type="text" class="login_frm_input" placeholder="Enter email">
        <div class="login_frm_error">Please enter a phone number or email</div>
        <input type="text" class="login_frm_input" placeholder="Enter password">
        <div class="login_frm_error">Please enter a phone number or email</div>
        <a href="{{URL::to('/admin')}}">
            <button class="login_frm_continue_btn">Continue</button>
        </a>
        
    </div>
    </section>
@endsection