<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li><a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a></li>
                <li><a class="nav-item nav-link" href="#">Features</a></li>
                <li><a class="nav-item nav-link" href="{{route('posts.index')}}">Posts</a></li>
                <li><a class="nav-item nav-link" href="{{route('posts.create')}}">Create New</a></li>
                <li><a class="nav-item nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a></li>

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
{{--                    <li><a href="#"></a></li>--}}
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-bell">
                                @if(count(auth()->user()->unreadNotifications))
                                <span class="badge badge-dark" id="spanR">{{count(auth()->user()->unreadNotifications)}}</span>
                                @endif
                            </i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="ulrefresh">
                            <form method="post" id="readall">
                                {{csrf_field()}}
                                <button type="submit" class="btn btn-primary" style="width: auto;">Mark all as read</button>
                            </form>
                            @foreach(auth()->user()->unreadNotifications as $notification)
                               <li style="background: lightgray">{{$notification->data['data']}}</li>
                            @endforeach
                                @foreach(auth()->user()->readNotifications as $notification)
                                    <li>{{$notification->data['data']}}</li>
                                @endforeach
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<script type="text/javascript">
    $(document).ready(function (){
        $("#readall").on('submit',function (e){
            e.preventDefault();
            var formData= $("#readall").serializeArray();
            $.ajax({
                url:"markasread",
                type:"post",
                data:formData,
                dataType:"json",
                success:function(response) {
                    if (response.success)
                    {
                        $('#app').load(location.href +  ' #app');
                    }
                }

            })
        })
    });
</script>
