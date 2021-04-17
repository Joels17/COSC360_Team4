window.onload = function()
{   
    document.getElementById("edit").onclick = (e)=>{
        var requiredInputs = document.querySelectorAll(".required");
        document.getElementById("submitButton").style.backgroundColor = "antiqueWhite";
        document.getElementById("submitButton").style.pointerEvents = "all";
        for (var i=0; i < requiredInputs.length; i++)
       {
           requiredInputs[i].style.backgroundColor = "white";
           requiredInputs[i].style.pointerEvents = "all";
          
       }
    }
   
    document.getElementById("form-master").onsubmit = (e) =>{

        
        checkPasswordMatch(e);
       
    }

}

