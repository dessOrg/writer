
$(function ()
{

  $(".form2").hide();

  $(".next, .prev").bind("click", function () {
    $(".form1, .form2").hide();

    if ($(this).attr("class") == "prev")
    {
      $(".form1").show();
    }
    else
    {
      $(".form2").show();
    }
  });

});
