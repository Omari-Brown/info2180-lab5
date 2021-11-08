"use strict" ;

window.onload=function()
{
    console.log("Window loaded");
    var lookupresult = document.getElementById("result");
    var buttons = document.getElementsByTagName("button");
    Array.from(buttons).forEach(function (button)
    {
        button.addEventListener("click", function ()
        {
            var country = document.getElementById("country").value.trim();
            var context = "";
            //if (document.getElementById("lookup2").clicked)
            console.log(event.target.id);
            if(event.target.id == "lookup2")
            {
                console.log("Lookup Cities");
                context = "cities";
            }
            console.log(`Country is ${country}`);
            console.log(`Context is ${context}`);
            fetch(`world.php?country=${country}&context=${context}`)
                .then(console.log("Fetching"))
                .then(response => response.text())
                .then(data => lookupresult.innerHTML = data)
                .catch(error => 
                {
                    console.log("There was an error");
                    console.log(error);
                });
        });
    });
    //lookupresult.setAttribute("class", "hide");
    
    /*
    searchbutton.addEventListener("click", function ()
    {
        //event.preventDefault();
        var searchvalue = document.getElementById("searchinput").value.trim();
        console.log(`Search value is ${searchvalue}`);
        console.log(`Length is: ${searchvalue.length}`);
        fetch(`superheroes.php?query=${searchvalue}`)
        //fetch("http://localhost/info2180-lab4/superheroes.php")
            .then(console.log("Fetching"))
            .then(response => response.text())
            .then(data => searchresult.innerHTML = data)
            .catch(error => 
            {
                console.log("There was an error");
                console.log(error);
            });
    });*/
    
};
