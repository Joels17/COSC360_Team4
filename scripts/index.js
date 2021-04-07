

window.addEventListener('load', function () {
    var uploadField = document.getElementById("file");
    uploadField.onchange = function() { // This function checks to make sure the file upload isn't too big
        if(this.files[0].size > 100000){ 
            
           alert("File is too big!");
           this.value = "";
        };
        console.log("HI");
    };
  })