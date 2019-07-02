@extends('layouts.app')

@section('content')
  <section class="py-4">
    <div class="container">
      <div class="row">

        <h1 class="title-pmess"> {{ auth()->user()->name}}'s Messages</h1>

        <table class="table">
          <thead class="thead-light">
            <tr>
              <th><input type="checkbox" name="" value=""></th>
              <th scope="col" class="star"><i class="far fa-star"></th>
                <th scope="col" class="sent-date"><i class="far fa-clock"></i></th>
                {{-- <th scope="col">Title</th> --}}
                <th scope="col" class="contMess" >Content</th>
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
                <tr data-id="{{$message->id}}" class="message">
                  <th><input type="checkbox" name="messages[]" value=""></th>
                  <th scope="row" class="star"><i class="far fa-star"></th>
                    <td class="sent-date">{{$message-> sent_date}}</td>
                    {{-- <td>{{$message-> title}}</td> --}}
                    <td class="contMess"><p class="m-0">{{$message-> content}}</p></td>
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
          <div id="show-message">

            <div class="sender d-flex align-items-center justify-content-between">
              <i class="fas fa-arrow-left"></i>
              <span id="sender">w.lafdili@gmail.com</span>
              <span id="sent-date">10-20</span>
            </div>
            <div class="box">
              <div class="rental d-flex ">
                <div class="etichetta d-flex justify-content-center align-items-center px-3">
                  <b>Rental </b>
                </div>
                <div class="d-flex align-items-center pl-2">
                  <span id="rental">Id qui exercitationem repellendus.</span>
                </div>
              </div>
              <div class="content p-3">
                <p id="message-content">
                  Aut saepe autem vel officiis consequatur et. Dolorum qui quia non cumque rem. Saepe consequatur iste velit corporis id. Maxime aperiam sit eum autem dolorum quos.

                </p>
              </div>

            </div>

            <div class="">

            </div>

          </div>
        </div>

  </section>

  <script type="text/javascript">

    $(document).ready(function(){

      var message = $("tr.message");
      var messageBox = $('#show-message');
      var sender = messageBox.find("#sender");
      var sentDate = messageBox.find("#sent-date");
      var rental = messageBox.find("#rental");
      var messageContent = messageBox.find("#message-content");

      var closeMessage = messageBox.find('.fas.fa-arrow-left');


      function getMessageById(id){


        $.ajax({

          url: "/inbox/" + "id",
          method: 'GET',
          data : {id:id},
          // dataType:'json',
          success: function (dataIn){

            sender.html(dataIn.sender);
            sentDate.html(dataIn.sent_date);
            rental.html(dataIn.rental);
            messageContent.html(dataIn.content);


            messageBox.show();




          },
          error : function(request,status,error){

            console.log(request, "-",error);
          }
        })

      }

      message.click(function(event){

        if(!$(event.target).is(".delete") && !$(event.target).is(".fas.fa-trash-alt")){

          var id = $(this).data('id');
          getMessageById(id);
        }
      })

      closeMessage.click(function(){

        messageBox.hide();



    })
  })
  </script>
@stop
