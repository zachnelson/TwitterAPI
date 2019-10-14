function displayTweets(tweets){
    tweets.forEach(insertTweets);
}

function insertTweets(tweet){

    //find where to display the tweets
    let element = document.getElementById("read");

    let divParent = document.createElement("div");
    divParent.setAttribute("class", "card mt-2");

    let divChild = document.createElement("div");
    divChild.setAttribute("class", "card-body");

    //insert image
    let img = document.createElement("img");
    img.setAttribute("class", "rounded-circle");
    img.setAttribute("src", tweet['user']['profile_image_url']);
    divChild.appendChild(img);

    //insert link
    let a = document.createElement("a");
    a.setAttribute("href", "https://twitter.com/" + tweet['user']['screen_name']);
    a.setAttribute("target", "_blank");
    a.setAttribute("class", "pl-2");
    a.innerHTML = "<b>" + tweet['user']['name'] + "(@" + tweet['user']['screen_name'] + ")</b> tweeted:";
    divChild.appendChild(a);
    divChild.appendChild(document.createElement("br"));
    divChild.appendChild(document.createElement("br"));

    //insert tweet
    let h3 = document.createElement("h3");
    let tweetText = document.createTextNode(tweet['text']);
    h3.appendChild(tweetText);
    divChild.appendChild(h3);
    divChild.appendChild(document.createElement("br"));

    //insert timestamp
    let tweetTime = document.createTextNode("Tweeted on " + tweet['created_at']);
    divChild.appendChild(tweetTime);

    //insert into dom
    divParent.appendChild(divChild);
    element.appendChild(divParent);
}