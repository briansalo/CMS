<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts 
    <script src="{{ asset('js/app.js') }}" defer></script> "this code i put it in the bottom in order to enable the trix editor"
      -->
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

       <!-- aron ang color sa info button kay white ang text -->
<style>
 a.btn-info{
    color: #fff;
 } 
 .anyClass{
height: 300px;
overflow-y: scroll;
position: sticky;
top: 0;   
 }
</style>
    @yield('css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand  " href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('change_profile') }}">
                                      Change Profile
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                </div>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

 
        @auth
        <div class="container-full">
           @if(session()->has('success'))
                  <div class="alert alert-success">
                    {{ session()->get('success')}}
                  </div>
            @endif 
           @if(session()->has('error'))
                  <div class="alert alert-danger">
                    {{ session()->get('error')}}
                  </div>
            @endif           
            <div class="row">
                <div class="col-12">
                    <div class="row">
                <div class="col-md-3 mt-5 anyClass">
                    <ul class="list group">
                        <!-- (OPEN) "isadmin" method. naa na siya sa user model dedtoa sa model g define dedtoa nga ang isadmin method kay pag ang role is admin -->
                        @if(auth()->user()->superAdmin() or auth()->user()->isAdmin())
                    
                            <li class="list-group-item">
                                <a href="{{ route('index_admin')}}">All Post</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('categories.index')}}">Category</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('tags.index')}}">Tag</a>
                            </li>
                           @endif 
                           @if(auth()->user()->superAdmin()) 
                            <li class="list-group-item">
                                <a href="{{ route('trashed_post')}}">Trashed Post</a>
                            </li>
                             @endif                         
                    </ul>  
                                                
                           <!-- CLOSE -->

                            <ul class="list group mt-5">
                                <li class="list-group-item">
                                    <a href="{{ route('posts.index')}}">Post</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{ route('list_user')}}">Add a friend</a>
                                </li> 
                                <li class="list-group-item">
                                    <a href="{{ route('list_request')}}">Friend Request</a>
                                </li>                                             
                                <li class="list-group-item">
                                    <a href="{{ route('list_friend')}}">Friend List</a>
                                </li>   

                            </ul>     
                </div>
                 <!-- (open )ng condtion ko derea kay aron once naa sa trash post nga url ang front end naka align ra gihapon -->
                @if(\Request::is('trashed_posts')) 
                <div class="col-md-8 mt-5">
                     @yield('content')
                 </div>    
                  @else   
                <div class="col-md-6">
                     @yield('content')
                </div>
                <!-- right sidebar-->
                <div class="col-md-3 mt-5 anyClass">
                    <ul class="list group">
                        <!-- (OPEN) "isadmin" method. naa na siya sa user model dedtoa sa model g define dedtoa nga ang isadmin method kay pag ang role is admin -->
                        @if(auth()->user()->superAdmin() or auth()->user()->isAdmin())
                    
                            <li class="list-group-item">
                                <a href="{{ route('fb_clone')}}">fb clone</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('bootstrap')}}">bootstrap</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('profile')}}">profile</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('list-of-user')}}">list-of-user</a>
                            </li>
                           @endif 
                           @if(auth()->user()->superAdmin()) 
                            <li class="list-group-item">
                                <a href="{{ route('trashed_post')}}">Trashed Post</a>
                            </li>
                             @endif                         
                    </ul>  
                         
                </div>
                @endif 
                 </div></div>
            </div><!--row -->
        </div>  <!--container -->
        @else
        @yield('content')
        @endauth

    </div><!--class id app -->

<!-- kay g balhen man nato ne nga script sa ubos gikan sa taas walaon nato ang defer nga naka butang ane aron mo function siya kay naa na siya sa ubos gamit ratong defer pag naa ne siya sa taas -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')


</body>
</html>
