@extends('...layouts.default')

@section('title')
    Create a new class
@endsection
@section('body')
<div class="class-creation-form color-a">
        <div>
        <table class="color-a">
            {{ Form::open(array('route' => array('classes.store'), 'method' => 'post')) }}
            @if($errors->has())
            <tr>
                <td colspan="2">
                @foreach ($errors->all() as $error)
                   <div class="error">{{{ $error }}}</div>
                @endforeach
                </td>
           </tr>
           @endif
            <tr>
                <td>
                    {{Form::label('name','Name',array('class' => 'label-form'))}}
                </td>
                <td>
                    {{Form::text('name', null,array('class' => ''))}}
                </td>
            </tr>
            <tr>
                <td>
                {{Form::label('school','School',array('class' => 'label-form'))}}
                </td>
                <td>
                @if(Session::has('selectSchool'))
                    {{ Form::select('school', $schoolList, Session::pull('selectSchool'), array('class' => 'select')) }}
                @else
                    {{ Form::select('school', $schoolList, null, array('class' => 'select')) }}
                @endif
                </td>
            </tr>
            <tr>
                <td>
                {{Form::label('degree','Degree',array('class' => 'label-form'))}}
                </td>
                <td>
                {{Form::text('degree', null,array('class' => ''))}}
                </td>
            </tr>
            <tr>
                <td>
                {{Form::label('scollaryear','Scholar Year',array('class' => 'label-form'))}}
                </td>
                <td>
                {{ Form::select('scollaryear', $schollarYears, null, array('class' => '')) }}
                </td>
            </tr>
            <tr>
                <td>
                {{Form::label('domain','Domain',array('class' => 'label-form'))}}
                </td>
                <td>
                {{Form::text('domain', null,array('class' => ''))}}
                </td>
            </tr>
            <tr>
                <td>
                {{Form::label('visibility','Visibility',array('class' => 'label-form'))}}
                </td>
                <td>
                {{ Form::select('visibility', $visibilityList, null, array('class' => '')) }}
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                {{Form::submit('Create', array('class' => 'button'))}}
                </td>
            </tr>
            {{ Form::close() }}
        </table>
    </div>
</div>
@stop

