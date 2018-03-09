
$(function ()
{

  $(".form2, .final, .view").hide();

  $(".next, .prev, .last, .preview").bind("click", function () {
    $(".form1, .form2, .final, .view").hide();

    if ($(this).attr("class") == "prev")
    {
      $(".form1").show();
    }
    else if ($(this).attr("class") == "next")
    {
      $(".form2").show();
    }
    else if ($(this).attr("class") == "last")
    {
      $(".final").show();
    }
    else if ($(this).attr("class") == "preview")
    {
      $(".view").show();
      }
  });

});



