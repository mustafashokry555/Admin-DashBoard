<form  method="POST" id='logout' action="{{url('logout')}}">
    @csrf
    
  </form>

  <script>            
  document.addEventListener("DOMContentLoaded", function(event) {
            document.createElement('form').submit.call(document.getElementById('logout'));
          });         
</script>