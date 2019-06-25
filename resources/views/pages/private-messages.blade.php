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
            <th scope="col">Title</th>
            <th scope="col">Sender</th>
            <th> <i class="far fa-trash-alt"></i></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($messages as $message)
          <tr class="message">
            <th><input type="checkbox" name="" value=""></th>
            <th scope="row"><i class="far fa-star"></th>
            <td class="elemTab">{{$message-> sent_date}}</td>
            <td class="elemTab">{{$message-> title}}</td>
            <td class="messCont elemTab hidden">{{$message-> content}}</td>
            <td class="sendMess elemTab">{{$message-> sender}}</td>
            <td>
              <form action="{{ route('destroyMess', $message->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="delete" type="submit" name="button"><i class="fas fa-trash-alt"></i></button>
              </form>
            </td>
            {{-- <td>
              {{-- <div class="hidden">
                ciao
              </div> --}}
            {{-- </td> --}}
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
