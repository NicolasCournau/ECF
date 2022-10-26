
/* theme */

$('#theme').toggleClass(localStorage.toggled);

function darkLight() {

  if (localStorage.toggled != 'dark') {
    $('#theme').toggleClass('dark', true);
    localStorage.toggled = "dark";
     
  } else {
    $('#theme').toggleClass('dark', false);
    localStorage.toggled = "";
  }
}


if ($('main').hasClass('dark')) {
   $( '#checkBox' ).prop( "checked", true )
} else {
  $( '#checkBox' ).prop( "checked", false )
}


/* Searchbar */

$(document).ready(function(){
    $("#search").keyup(function(){
        var input = $(this).val();
        /*alert(input);*/

        if(input != ""){
            $.ajax({
                method:"POST",
                url:"/search",
                data: {input:input},

                success:function(data){
                    $("#searchResult").html(data);
                    $("#searchResult").css("display", "block");
                }
            });
        } else {
            $("#searchResult").css("display", "none");
        }
    });
});