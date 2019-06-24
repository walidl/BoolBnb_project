@extends('layouts.app')

@section('content')

  <div class="container">
      <h1 class="title-pmess"> {{ auth()->user()->name}}'s Messages</h1>
      <table>
        <div class="message-nav">
          <th class="mess-title">Title</th>
          <th class="mess-content">Content</th>
          <th class="mess-received">Received at</th>
          <th class="mess-from">From</th>
        </div>
        @foreach($messages as $message)
          <tr class="row-tab">
            <td>{{$message-> title}} </td>
            <td><p> {{$message-> content}} </p></td>
            <td>{{$message-> sent_date}} </td>
            <td>NOME</td>
          </tr>
        @endforeach
      </table>
  </div>
@stop
