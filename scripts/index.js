
/*
window.addEventListener('load', function () {
    var uploadField = document.getElementById("file");
    uploadField.onchange = function() { // This function checks to make sure the file upload isn't too big
        if(this.files[0].size > 100000){ 
            
           alert("File is too big!");
           this.value = "";
        };
    };
  })
  */

  $(document).ready(function(){
    $("#test").click(function(){
        //var t = $("#title").val();
        var t = "sample";

        $.get("db_search.php",
        {title:t})
        .done(function(data){
        $("#content").html(data); //You can change this to have the content display in the desired section

        });
    });
    $("#author-btn").click(function(){
        var a = $("#author").val();

        $.get("db_search.php",
        {author: a})
        .done(function(data){
            $("#content").html(data);
        });
    });

  });

