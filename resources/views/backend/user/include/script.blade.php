<script>
    $(document).ready(function ()
    {
        //alert('Hello World');

        $('#city_id').change(function ()
        {

            //alert('selected');
            var city=$(this).val();
            //alert(city);
            var path="{{URL::route('backend.city.getCity')}}";

            $.ajax({

                url:path,
                data:{'city_id':city,'_token':$('meta[name="csrf-token"]').attr('content')},
                method:'post',
                dataType:'text',
                success:function(response)
                {
                    // console.log(response);
                    $('#area_id').empty();
                    $('#area_id').append(response);
                }
            });
        });

    });
</script>
