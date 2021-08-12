<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(400, 0).slideUp(400, function(){
            $(this).remove();
        });
    }, 4000);
</script>

	<div>
        @if(Session::has('status'))
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert">&times</a>
                        <strong> Sucesso!  </strong> {{ Session::get('status')  }}
                    </div>
        @elseif(Session::has('status-not'))
        <div class="alert alert-danger">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong> Erro!</strong> {{ Session::get('status-not') }}
                    </div>
            @elseif(Session::has('status-not2'))
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
               {{ Session::get('status-not2') }}
            </div>
        @elseif(Session::has('status-alert'))
            <div class="alert alert-warning">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        {{ Session::get('status-alert') }}
             </div>
        @endif
    </div>



          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
