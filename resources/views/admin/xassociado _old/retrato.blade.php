@extends('template.layoutmaster')

@section('conteudo-principal')

    <!-- Page Heading -->
    <h1 class="h5 mb-4 text-gray-800">Gerenciar / Associado / Cadastrar / Foto</h1>

    <div class="row">

        <div class="col-lg-12 order-lg-1">

            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{$associado->companhia->nome}}<br>
                        Sr(a): {{$associado->nome}} | RG nº {{$associado->rg}} - {{$associado->rgorgaoemissor}} | CPF nº {{$associado->cpf}}
                    </h6>
                </div>

                <div class="card-body">

                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="enquadramento">
                                        <video id="video" width="320" height="380" autoplay>
                                        Seu browser não está preparado para a captura de video!
                                        </video>

                                        <form>
                                        <input type="button" id="snap" value="Capturar Imagem" onClick="bater_foto()" class="btn btn-primary" style="margin-left: 80px; margin-top: 5px;">
                                        </form>
                                    </div>
                                </div>


                                <div class="col-lg-4">
                                    <div class="enquadramento" id="resultado">
                                        <canvas id="canvas" width="320" height="380" style="background: #f5f5f5;"></canvas>
                                        <button id="salvarimagem" class="btn btn-primary" style="margin-left: 75px; margin-top: 5px; visibility: hidden"  onclick="salvar_foto();">Salvar esta Imagem</button>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="enquadramento" id="salva">
                                        <!--
                                        <span id="carregando"></span>
                                        <img id="completado" src=""/>
                                        -->
                                        <p style="margin-left: 120px;"><strong>Dicas</strong></p>
                                        <ul style="margin-top: 30px;">
                                            <li>Assegure-se que haja uma boa <strong>iluminação</strong> para captar o <strong>alvo</strong>;</li>
                                            <br>
                                            <li><strong>Permita</strong> que o navegador utilize sua <strong>câmera</strong>;</li>
                                            <br>
                                            <li>Posicione o "alvo" no <strong>centro</strong> da Câmera;</li>
                                            <br>
                                            <li>Click no botão Capturar Imagem;</li>
                                            <br>
                                            <li>Verifique o resultado em <strong>Prévia</strong>;</li>
                                            <br>
                                            <li>Se o resultado for satisfatório, click no botão <strong>Salvar esta Imagem</strong>, caso contrário, ajuste novamente o alvo no centro da câmera e repita os passos anteriores;</li>
                                        </ul>
                                        </div>
                                </div>
                            </div>
                        </div>

                      <textarea id="dataurlimagem" name="message" rows="10" cols="30"></textarea>

                      <br><br><br><br>

                    <!-- FIM SCRIPT DO LABCPA -->




                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')

<script>

  function bater_foto() {
    var canvas  = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var video   = document.getElementById('video');

    context.drawImage(video, -150, -100, 640, 480);


    document.getElementById('salvarimagem').style.visibility = 'visible';
  }




    // Get access to the camera!
    if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        // Not adding `{ audio: true }` since we only want video now
        navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
            video.srcObject = stream
            video.play();
        });
    }

    function salvar_foto() {
      var canvas  = document.getElementById("canvas");
      var dataUrl = canvas.toDataURL();

      document.getElementById("dataurlimagem").value = dataUrl;

      // var file = document.getElementById("base64image").src;
      var formdata = new FormData();
          formdata.append("base64image", dataUrl);
          formdata.append("id", {{$associado->id}});
          formdata.append("nome", '{{$associado->nome}}');
          formdata.append("cpf", '{{$associado->cpf}}');
          formdata.append("companhia", '{{$associado->companhia->nome}}');
          formdata.append('_token', '{{csrf_token()}}');

      $.ajax({
        url: "{{url('ajax-canvas-upload')}}",
        data: formdata,
        type: "POST",
        contentType: false,
        processData: false,
            success: function (data) {
                alert(data);
            },
            error: function (xhr, status, error) {
                alert(xhr.responseText);
                $('#preview_image').attr('src', '{{asset('images/noimage.jpg')}}');
            }
        });
    }

</script>



@endsection




