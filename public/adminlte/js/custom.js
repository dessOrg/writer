
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



