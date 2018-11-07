var sendReq;
window.onload = function () {
    var responseData;
    sendReq = function (data) {
        console.log(data);

        // Default options are marked with *
        return fetch("handleCart.php", {
            method: "POST", // *GET, POST, PUT, DELETE, etc.
            mode: "cors", // no-cors, cors, *same-origin
            cache: "no-cache", // *default, no-cache, reload, force-cache, only-if-cached
            credentials: "same-origin", // include, *same-origin, omit
            headers: {
                "Content-Type": "application/json",
                // "Content-Type": "application/x-www-form-urlencoded",
            },
            redirect: "follow", // manual, *follow, error
            referrer: "no-referrer", // no-referrer, *client
            body: JSON.stringify(data), // body data type must match "Content-Type" header
        })
            .then(response => response.json()) // parses response to JSON
            .then(res => {
                console.log(res); {
                    if (res.action == "error") {
                        console.log("NIE OK")
                        switch (res.code) {
                            case "logIn":
                                window.alert("Zaloguj się");
                                break;
                            case "contentType":
                                console.log(res.given)
                            break;
                            default:
                                console.log("lol xd");
                                break;
                        }
                    } else {
                        console.log('ok')
                        switch (res.action) {
                            case "getCart":
                                console.log("got it")
                                let cart=document.getElementById("cart");
                                let list=document.createElement("ul");
                                cart.innerHTML="";
                                res.data.forEach((element,index) => {
                                    let comp=document.createElement("li");
                                    comp.innerText=`kod:${element.kod},nazwa:${element.nazwa},cena:${element.cena}`
                                    list.appendChild(comp);
                                });
                                cart.appendChild(list);
                                break;
                            default:
                                console.log("lol xd");
                                break;
                        }
                    }
                }
            })

    }
sendReq({"action":"getCart"})
}