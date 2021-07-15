<form  method="POST" id='verify' action="{{url('logout')}}">
    @csrf
    
</form>

<script>            
document.addEventListener("DOMContentLoaded", function(event) {
            document.createElement('form').submit.call(document.getElementById('verify'));
        });         
</script>