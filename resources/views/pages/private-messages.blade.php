@extends('layouts.app')

@section('content')

  <div class="container">
      <h1 class="title-pmess"> {{ auth()->user()->name}}'s Messages</h1>

      <table class="table">
        <thead class="thead-light">
          <tr>
            <th><input type="checkbox" name="" value=""></th>
            <th scope="col"><i class="far fa-star"></th>
            <th scope="col"><i class="far fa-clock"></i></th>
            {{-- <th scope="col">Title</th> --}}
            <th scope="col contMess">Content</th>
            <th scope="col">Sender</th>
            <th>
              <button class="del-btn">
                <i class="fas fa-trash-alt"></i>
              </button>
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($messages as $message)
          <tr class="message">
            <th><input type="checkbox" name="" value=""></th>
            <th scope="row"><i class="far fa-star"></th>
            <td class="sent-date">{{$message-> sent_date}}</td>
            {{-- <td>{{$message-> title}}</td> --}}
            <td class="contMess">{{$message-> content}}</td>
            <td>{{$message-> sender}}</td>
            <td>
              <form action="{{ route('destroyMess', $message->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="delete" type="submit" name="button"><i class="fas fa-trash-alt"></i></button>
              </form>
            </td>
            <td class="messCont hidden">{{$message-> content}}</td>

          </tr>
        @endforeach
        </tbody>
      </table>
  </div>

  {{-- <script type="text/javascript">

    var $ = require('jquery');

    $(document).on("click", ".row", function(){

      console.log("CIAONE FUNZIONO");
    });
  </script> --}}
@stop
