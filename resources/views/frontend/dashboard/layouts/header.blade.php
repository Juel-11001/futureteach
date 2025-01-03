<div class="wsus__dashboard_menu">
    <div class="wsusd__dashboard_user">
      {{-- <img src="{{asset(Auth::user()->image ? Auth::user()->image : 'uploads/no_image.png')}}" alt="img" alt="img" class="img-fluid"> --}}
      <img src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('uploads/no_image.jpg') }}" alt="img" class="img-fluid">
      <p>{{ Auth::user()->name }}</p>
    </div>
  </div>