"use strict" ;

window.onload=function()
{
    console.log("Window loaded");
    var lookupresult = document.getElementById("result");
    var lookup1button = document.getElementById("lookup1");
    //lookupresult.setAttribute("class", "hide");
    lookup1button.addEventListener("click", function ()
    {
        var country = document.getElementById("country").value.trim();
        console.log(`Country is ${country}`);
        console.log(`Length is: ${country.length}`);
        fetch(`world.php?country=${country}`)
            .then(console.log("Fetching"))
            .then(response => response.text())
            .then(data => 
            {
                //lookupresult.classList.remove("hide");
                lookupresult.innerHTML = data;
            })
            .catch(error => 
            {
                console.log("There was an error");
                console.log(error);
            });
    });
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
