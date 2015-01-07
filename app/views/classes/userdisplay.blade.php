@extends('layouts.default')
@section('title')
    Class Participant
@endsection
@section('body')
        <div class="list-classes">
        @foreach($classes_public as $class)
        <div class="class-tile color-a">
            <a href="/classes/display/{{$class->id}}" class="class-title-tile color-b hover-color-a">{{$class->name}}</a>
        <table>
            <tr>
                <td>Created at </td>
                <td> {{ $class->created_at }} </td>
            </tr>
            <tr>
                <td>Last update </td>
                <td> {{ $class->updated_at }} </td>
            </tr>
            <tr>
                <td>{{$class->getSchoolName()}}</td>
                <td>{{$class->getCitie()}} {{$class->getCanton()}}</td>
            </tr>
            <tr>
                <td>Schollar year</td>
                <td>{{$class->scollaryear}}</td>
            </tr>
            <tr>
                <td>Degree</td>
                <td>{{$class->degree}}</td>
            </tr>
            <tr>
                <td>Domain</td>
                <td>{{$class->domain}}</td>
            </tr>
            <tr>
                <td>Visibility</td>
                <td>{{$class->getVisibilityStr()}}</td>
            </tr>
            <tr>
                <td></td>
                <td>
                    {{ Form::open(array('route' => array('/classes/resign/{idclass}','idclass'=>$class->id), 'method' => 'get')) }}
                        {{Form::submit('Resign', array('class' => 'button'))}}
                    {{ Form::close() }}
                </td>
            </tr>
            </table>
            </div>
        @endforeach
        </div>
        <div class="page-navigation">
            @for($i = 1;$i < $numberOfPages+1;$i++)
                @if($i == $pageNo)
                    <a href="/classes/participant/{{$i}}" class="page-navigation-current">{{$i}}</a>
                @else
                    <a href="/classes/participant/{{$i}}" class="page-navigation-not-current">{{$i}}</a>
                @endif
            @endfor
        </div>
@stop










