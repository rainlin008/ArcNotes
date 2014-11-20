@extends('layouts.default')
@section('body')
<div class="">
        <h2>new class</h2>
        <?php
            echo Session::get('isLogged');

            $schoolList = DB::table('schools')->lists('name','id');

            $visibilityList =['0000' => 'public','0001' => 'private'];
        ?>
        {{ Form::open(array('route' => array('classes.store'), 'method' => 'post')) }}
        @if($errors->any())
            <div class="">
                <a class="" data-dismiss="alert">&times;</a>
                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
            </div>
        @endif
            {{Form::label('name','Name')}}
            {{Form::text('name', null,array('class' => ''))}}
        <br/>

            {{Form::label('school','School')}}
            {{ Form::select('school', $schoolList, null, array('class' => '')) }}
            <button onclick="openPopup()" class="btn btn-default">New School</button>
         <br/>

            {{Form::label('degree','Degree')}}
            {{Form::text('degree', null,array('class' => ''))}}
            <br/>

            {{Form::label('scollaryear','Scollar Year')}}
            {{Form::text('scollaryear', null,array('class' => ''))}}
               <br/>

            {{Form::label('domain','Domain')}}
            {{Form::text('domain', null,array('class' => ''))}}
                <br/>

            {{Form::label('visibility','Visibility')}}
            {{ Form::select('visibility', $visibilityList, null, array('class' => '')) }}
                <br/>

        {{Form::submit('Create', array('class' => ''))}}
        {{ Form::close() }}
</div>
@stop

<script language="javascript" type="text/javascript">
    function openPopup()
    {
        newwindow = window.open('/school','New School','height=600,width=800');
        if (window.focus)
        {
            newwindow.focus()
        }
            return false;

    }
</script>