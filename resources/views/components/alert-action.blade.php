@if(session()->has('alert') && session()->get('alert'))
<script>
    Swal.fire({
        position: 'top-end',
        icon: "{{session()->get('status')}}",
        title: "{{session()->get('message')}}",
        showConfirmButton: false,
        timer: 1000
    })
</script>
@endif
