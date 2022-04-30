<script src="https://yastatic.net/share2/share.js"></script>
<script src="https://cdn.jsdelivr.net/npm/maska@latest/dist/maska.js') }}"></script>
<script src="{{asset('assets/js/carousel.js')}}"></script> 
<script src="{{asset('assets/js/masked.js')}}"></script>
<script src="{{ asset('assets/js/component-vue/slider.js') }}"></script>
<script src="{{ asset('assets/js/component-vue/dropdown.js') }}"></script>
<script src="{{ asset('assets/js/vivus.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
  crossorigin="anonymous"></script> 
<script src="{{ asset('assets/js/script.js') }}"></script>
<script>
$(document).ready(function(){
  $('[name="phone"]').mask("+7 (999) 999-99-99");
  $("#reqFeedback").on('submit', function(event) {
    event.preventDefault();
    let form = $(this);
    let action = form.attr("action");
    let type = form.attr("method");
    let _token = $('input[name="_token"]').val();
    let fd = new FormData(form[0]);
    let $inputs = form.find("input, select, button, textarea");
    axios.post(action, fd, {
          headers: {
              'X-CSRF-TOKEN': _token,
          },
        }).then(res => {
        if (res.status === 200) {
          $('#modal').addClass('modal__show');
        } 
        $inputs.prop("disabled", false);
        $inputs.val("");
        $inputs.prop("checked",false);
      }).catch((error) => console.log(error.response.data));   
  });

  $("#reqJoin").on('submit', function(event) {
    event.preventDefault();
    let form = $(this);
    let action = form.attr("action");
    let type = form.attr("method");
    let _token = $('input[name="_token"]').val();
    let fd = new FormData(form[0]);
    let $inputs = form.find("input, select, button, textarea");
    axios.post(action, fd, {
          headers: {
              'X-CSRF-TOKEN': _token,
          },
        }).then(res => {
        if (res.status === 200) {
          $('#modal').addClass('modal__show');
        } 
        $inputs.prop("disabled", false);
        $inputs.val("");
        $inputs.prop("checked",false);
      }).catch((error) => console.log(error.response.data));   
  });
});

window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
</script>