<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
	{{HTML::style('css/mainlayout.css');}}
	{{HTML::style('css/header.css');}}
	{{HTML::style('css/leftdock.css');}}
	{{HTML::style('css/contentlayout.css');}}
	{{HTML::style('css/jquery.toastmessage.css');}}

    {{ HTML::script("/js/jquery-2.1.3.min.js"); }}
	{{ HTML::script("/js/jquery.toastmessage.js"); }}
    <script type="text/javascript">
    {{Tools::createToastMessages()}}</script>
    @yield('page-scripts', '')

</head>
<body>
<div class="header row color-a">
			<div id="header-title">
				{{ HTML::image('img/logo.png', 'logo', array('class' => 'logo')) }}
			</div>
			<div id="header-menus" class="scroll-x">
			@if(Auth::check())
			     <a href="/classes/owned" class="header-menu-tile color-b hover-color-a">My Class Manager</a>
			     <a href="/classes/participant/1" class="header-menu-tile color-b hover-color-a">Your Classes</a>
			     <a href="/classes/create/" class="header-menu-tile color-b hover-color-a">New Class</a>
            @endif
                 <a href="/classes/public/1" class="header-menu-tile color-b hover-color-a">Public Classes</a>
                 <a href="/about/" class="header-menu-tile color-b hover-color-a">About</a>
            @if(!Auth::check())
                 <a href="/users/create" class="header-menu-tile color-b hover-color-a">Register</a>
            @endif
			</div>
			<div id="header-search">
				<div class="header-search-tile" > search bar </div>
			</div>
		</div>
		<div class="body row">
			<div class="left-dock col scroll-y color-a">
				<div class="profile">
				         @if(Auth::check())
				            <?php
				                $user = User::find(Auth::id());
				            ?>
				            <table>
                                <tr>
                                    <td>
                                        Welcome: {{$user->firstname}} {{$user->lastname}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    {{ Form::open(array('route' => 'logout', 'method' => 'post')) }}
                                        {{Form::submit('Logout', array('class' => 'button'))}}
                                    {{ Form::close() }}
                                    </td>
                                </tr>
				            </table>
                        @else

                            {{ Form::open(array('url' => 'login', 'method' => 'post')) }}
                            <table>
                                 @if($errors->has())
                                <tr>
                                    <td colspan="2">
                                @foreach ($errors->all() as $error)
                                    <div class="error">{{ $error }}</div>
                                @endforeach
                                    </td>
                                </tr>
                                @endif
                                    <td>{{Form::label('email','Email')}}</td>
                                    <td>{{Form::text('email', null,array('class' => ''))}}</td>
                                </tr>
                                <tr>
                                    <td>{{Form::label('password','Password')}}</td>
                                    <td>{{Form::password('password',array('class' => ''))}}</td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td><td>{{Form::submit('Login', array('class' => 'button'))}}</td>
                                </tr>
                            {{ Form::close() }}
                            <tr>
                                 <td>&nbsp;</td><td><a href="/user/create" class="color-a">Sign up.</a></td>
                            </tr>
                            </table>
                        @endif
				</div>
				<div class="context-menus-dock scroll-y">
				 @if(Auth::check())
                    @foreach(Auth::user()->getClasses() as $class)

                            <a href="/classes/display/{{$class->id}}" class="context-menu-tile-class color-b">{{$class->name}}</a>
                            @foreach($class->getCourses() as $course)
                                <a href="/courses/open/{{$course->id}}" class="context-menu-tile-course hover-color-b color-a ">{{$course->name}}</a></br>
                            @endforeach
                    @endforeach
                 @endif
				</div>
			</div>
			<div class="content col color-b">
			    <div class="content-title row">
                <h1>@yield('title')</h1>
			    </div>
			    <div class="content-body row scroll-y">
			    @yield('body')
			    </div>

			</div>
		</div>
		@show
</body>
</html>
