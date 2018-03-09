
$(function ()
{

  $(".form2, .final").hide();

  $(".next, .prev, .last").bind("click", function () {
    $(".form1, .form2, .final").hide();

    if ($(this).attr("class") == "prev")
    {
      $(".form1").show();
    }
    else if ($(this).attr("class") == "next")
    {
      $(".form2").show();
    }
    else 
    {
      $(".final").show();
    }
  });

});


$('#projectmiddle').click(function (e) {
        e.preventDefault();
//        $('#def').hide();
        var title = $('#title').val();
        var topic = $('#topic').val();
        var description = $('#description').val();
        var project_id = $('#project_id_m').val();
        console.log(project_id);
        
        $.ajax({
            dataType: 'json',
            type: "POST",
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             },
            url: '/client/project/middle',
            data: {_token: '{{ csrf_token() }}',project_id: project_id,title: title, topic: topic, description: description},
            success: function( response ) {
               
               $("#title").val(response.title);
               $("#topic").val(response.topic);
               $("#description").val(response.description); 
               
                console.log(response);
            },
            error: function() {
                console.log("erro");
            }
        });
    });


$('#projectfinnal').click(function (e) {
        e.preventDefault();
//        $('#def').hide();
        
        var video = $('#video').val();
        var project_id = $('#project_id_f').val();
        console.log(video);
        
        $.ajax({
            dataType: 'json',
            type: "POST",
            url: '/client/project/finnal',
            data: {_token: '{{ csrf_token() }}',video: video},
            success: function( response ) {
               
               $("#title").val(response.title);
               $("#topic").val(response.topic);
               $("#description").val(response.description); 
               $("#video").val(response.description);
                console.log(response);
            },
            error: function() {
                console.log("erro");
            }
        });
    });



