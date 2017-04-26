<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
  
        <a class="navbar-brand" href="{{URL('/')}}"><b>中正大學資管系 教室借用系統</b></a>
        <a class="navbar-brand" href="{{URL('/search')}}">教室查詢</a>
        <a class="navbar-brand" href="{{URL('/rule')}}">使用規範</a>
    </div><!-- /.navbar-header -->
       
    <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())
            <li><a href="{{URL('/logout')}}">Logout</a></li>
        @else
            <li><a href="{{URL('/login')}}">Login</a></li>
        @endif

    </ul><!-- /.navbar-right -->

</nav>
